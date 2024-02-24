<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Course;
use App\Models\Category;
use App\Models\Mentor;
use App\Models\Lesson;
use App\Models\MyCourse;
use App\Models\Review;
use App\Models\Chapter;
use App\Models\Order;
use App\Models\Site;
use SweetAlert;
use Auth;


class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( )
    {
        $maxuser =  User::where('role','student')->count();   
        $maxcourse = Course::where('status','published')->count();
        $maxmentor = User::where('role','mentor')->count();
        $site = Site::first();
        $data = Course::where('status','published')->orderBy('id','desc')->get();
        
        return view('frontpanel.home.course', compact('data','maxuser','maxcourse','maxmentor','site'));
    }

    public function ShowCourse(Course $course)
    {   
       
        $data = $course;
        $trailer = Chapter::where('course_id',$course->id)->with('lesson')->first();
        $trailer2 = Lesson::where('chapter_id',$trailer->id)->limit(1)->pluck('url_video')->first();
  
        // dd($trailer);
        $chapter = Chapter::where('course_id',$course->id)->with('lesson')->get();
        // $order = Order::where('user_id', Auth::user()->id)->where('status','pending')->first();
        $myCourse = MyCourse::Where('user_id',$course->id)->get();
        $review = Review::get();
        return view('frontpanel.home.courseDetail', compact('data','chapter','myCourse','review','trailer2'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categories($id)
    {
        
        $data = Course::where('category_id',$id)->orderBy('id','desc')->get();
        $category = Category::where('id',$id)->pluck('name')->first();
        return view('frontpanel.categories.category', compact('data','category'));
    }

   
    public function order(Request $request, $id)
    {
        $course = Course::where('id', $id)->first();
      
        $order_check = Order::where('user_id', Auth::user()->id)->where('status', 'pending')->first();
      
         $order = new Order;
         $order->user_id = Auth::user()->id;
         $order->price   = $course->price;
         if($order->price == 0){
            $order->status  = 'success';
            $order->price   = $course->price;
            $order->kode    = 0;
           $order->save();
         }else{
            if(empty($order_check)){
            $order->status  = 'pending';
            $order->price   = 0;
            $order->kode    = mt_rand(100, 999);
            $order->save();
            }
         
        }
 
        //simpan ke mycourses
        $newOrder = Order::where('user_id', Auth::user()->id)->where('status', 'pending')->first();
        $freeOrder = Order::where('user_id', Auth::user()->id)->where('status', 'success')->first();
        //Check Pesanan Detail
        // $orderDetail_check = MyCourse::where('course_id', $course->id)->where('order_id', $newOrder->id)->first();
       
        
         $myCourse = new MyCourse;
         $myCourse->course_id   = $course->id;
         $myCourse->item_price  = $course->price;
         if($myCourse->item_price == 0){
            $myCourse->item_price  = $course->price;
            $myCourse->order_id    = $freeOrder->id;
            $myCourse->status      = 'success';
            $myCourse->user_id     = Auth::user()->id;
            $myCourse->save();
            alert()->success('Pesanan Telah Masuk Keranjang', 'Success');
            return redirect('my-course/'.$myCourse->user_id  );
         }else{
            $myCourse->item_price  = $course->price;
            $myCourse->order_id    = $newOrder->id;
            $myCourse->status      = 'pending';
            $myCourse->user_id     = Auth::user()->id;
            $myCourse->save();
         }
        
        
       
        $order =  Order::where('user_id', Auth::user()->id)->where('status', 'pending')->get();
        foreach($order as $data){
        $data->price =  $data->price + $course->price;
        $data->update();
        }
        alert()->success('Pesanan Telah Masuk Keranjang', 'Success');
        return redirect('checkout');
        
       
    }

     public function checkout()
     {
        $order = Order::where('user_id', Auth::user()->id)->where('status','pending')->first();
        // $total = MyCourse::where('order_id',$order->id)->where('item_price','!=',0)->get();
        $order_detail = [];
       if(!empty($order))
       {
        $order_detail = MyCourse::where('order_id',$order->id)->get();
       }
        

        return view('frontpanel.order.checkout', compact('order','order_detail'));
     }

     public function checkout_confirm()
     {
         if(Auth::check())
        $order = Order::where('user_id', Auth::user()->id)->where('status','pending')->first();
        $order->status = "checkout";
        $order->update();
        $order_detail = MyCourse::where('item_price',0)->first();

         alert()->success('Pesanan Sukses Chekcout Silahkan Lanjutkan Pembayaran', 'Success');
       return redirect('history/'.$order->id);
     }



     public function checkout_destroy($id)
     {
         $order_detail = MyCourse::where('id',$id)->first();
         
         //mengurangi jumlah Total Price di Order
         $order = Order::where('id',$order_detail->order_id)->first();
         $order->price = $order->price-$order_detail->item_price;
         $order->update();

         $order_detail->delete();
         return redirect()->back()->with('success','Data Berhasil di Delete');
     }

    public function history_transaction()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status', 'checkout')->get();
        
        return view('frontpanel.history.index', compact('order'));
    }

    public function history_detail($id)
    {
        $order = Order::where('id', $id)->first();
       
        $order_detail = MyCourse::where('order_id', $order->id)->get();
        
        return view('frontpanel.history.detail', compact('order','order_detail'));
    }

     public function transfer($id)
    {
        $order = Order::findorfail($id);
            
        return view('frontpanel.history.transfer', compact('order'));
    }
   
 public function transferStore(Request $request, $id)
    {
   
         $this->validate($request,[
            'foto'     => 'file|image|mimes:jpeg,png,jpg|max:2048',
           
        ]);

        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$nama_file);

            
        Order::find($id)->update([
			'foto'     => $nama_file,
		]);
       
    }
    return redirect()->back()->with('success','Course baru berhasil di tambahkan');
    }
}
