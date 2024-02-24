<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\MyCourse;
use App\Models\Certificate;
use Carbon\Carbon;
use App\User;
use Auth;
use PDF;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order = Order::paginate();
         if (request()->start_date || request()->end_date) {
        $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
        $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
        $order = Order::whereBetween('created_at',[$start_date,$end_date])->paginate();
        $transaction = Order::where('status','success')->select(DB::raw('sum(price + kode) as totalsales'))->whereBetween('created_at',[$start_date,$end_date])->first();   
         }else{
        $order = Order::paginate();
        $transaction = Order::where('status','success')->select(DB::raw('sum(price + kode) as totalsales'))->first();   
         }
        return view('admin.transaction.index',compact('order','transaction'));
    }

    public function laporanTransaksi(){
         return view('admin.transaction.laporanTransaksi');
    }

    public function cetakDataPdf(Request $request)
    {    
        $order = Order::all();
        if (request()->start_date || request()->end_date) {
        $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
        $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
        $order = Order::whereBetween('created_at',[$start_date,$end_date])->get();
        $nama = Order::whereBetween('created_at',[$start_date,$end_date])->first();
        $transaction = Order::where('status','success')->select(DB::raw('sum(price + kode) as totalsales'))->whereBetween('created_at',[$start_date,$end_date])->first();  
        $pdf = PDF::loadview('admin.transaction.transaksi_pdf',compact('order','transaction','nama'))->setOptions(['defaultFont' => 'sans-serif']);
    	return $pdf->stream('laporan_Data_Transaksi.pdf');

    } 
        
        // $transaction = Order::where('status','success')->select(DB::raw('sum(price + kode) as totalsales'))->first();
       
    }

     public function cetakDetailPdf($id)
    { 
        
        $order = Order::findorfail($id);
        $mycourse = MyCourse::where('order_id', $order->id)->with('course')->get();
        $pdf = PDF::loadview('admin.transaction.cetakdetail_pdf',compact('order','mycourse'))->setOptions(['defaultFont' => 'sans-serif'])->setPaper('a4', 'landscape')->setWarnings(false);
    	return $pdf->stream('laporan_Detail_Transaksi.pdf');

    }
     
    public function certificate()
    {
        $data = DB::table('certificates')
        ->leftjoin('my_courses', 'certificates.mycourse_id', '=', 'my_courses.id')
        ->leftjoin('courses', 'my_courses.course_id', '=', 'courses.id')
        ->select('certificates.*', 'courses.title')
        ->orderBy('certificates.id', 'ASC')->paginate();
        return view('admin.certificate.index',compact('data'));
    }

    // public function certificateEdit($id)
    // {
    //     $course = DB::table('certificates')
    //     ->leftjoin('my_courses', 'certificates.mycourse_id', '=', 'my_courses.id')
    //     ->leftjoin('courses', 'my_courses.course_id', '=', 'courses.id')
    //     ->select('certificates.*', 'courses.title')
    //     ->where('certificates.id',$id)->orderBy('certificates.id', 'ASC')->get();
        
    //     $data =  Certificate::findorfail($id);
        
    
    //     return view('admin.certificate.edit', compact('data','course'));
    // }

    // public function certificateUpdate(Request $request, $id)
    // {
                
    //     if($request->hasFile('image1')){

    //         $file = $request->file('image1');
    //         $nama_file = time()."_".$file->getClientOriginalName();
    //         // isi dengan nama folder tempat kemana file diupload
    //         $tujuan_upload = 'data_file';
    //         // isi dengan nama folder tempat kemana file diupload
    //         $file->move($tujuan_upload,$nama_file);
    //         Certificate::find($id)->update([
    //             'image1'        => $nama_file,
    //             'username'      => $request->username,
    //             'email'         => $request->email,
    //             'mycourse_id'   => $request->mycourse_id,
    //             'link_project'  => $request->link_project,
    //             'description'   => $request->description,
    //             'status'        => $request->status
               
    //         ]);
            
    //     }else{
    //         Certificate::find($id)->update([
    //             'username'    => $request->username,
    //             'email'       => $request->email,
    //             'mycourse_id' => $request->mycourse_id,
    //             'link_project'=> $request->link_project,
    //             'description'   => $request->description,
    //             'status'        => $request->status
    //         ]);
            
    //     }
        
    //     return redirect('admin/certificate')->with('success','data certificate berhasil di tambahkan');
    // }
   
    public function show($id)
    {
        $order = Order::findorfail($id);
        $mycourse = MyCourse::where('order_id', $order->id)->with('course')->get();
        
        return view('admin.transaction.show',compact('order','mycourse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findorfail($id);
        $mycourse = MyCourse::where('order_id', $order->id)->with('course')->get();
      
        return view('admin.transaction.edit',compact('order','mycourse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Order::find($id)->update([
            'user_id'       => $request->user_id,
            'price'         => $request->price,
            'kode'         => $request->kode,
            'status'     => $request->status
        ]);

        $mycourse =   MyCourse::where('order_id', $id)->update([
            'status' => $request->status
        ]);

       

        alert()->success('Pesanan Telah Masuk Keranjang', 'Success');
        return redirect('admin/transaction');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

      public function changeStatusTransaction($id)
    {
        $data = Order::where('id',$id)->first();
        
        $status_sekarang = $data->status;

        if($status_sekarang == 'success'){
            Order::where('id',$id)->update(['status'=> 'pending']);
        }else{
            Order::where('id',$id)->update(['status'=> 'success']);
        }
  
        return redirect()->back();
    }


    
    //   public function changeStatusCertificate($id)
    // {
    //     $data = Certificate::where('id',$id)->first();
        
    //     $status_sekarang = $data->status;

    //     if($status_sekarang == 'success'){
    //         Certificate::where('id',$id)->update(['status'=> 'pending']);
    //     }else{
    //         Certificate::where('id',$id)->update(['status'=> 'success']);
    //     }
  
    //     return redirect()->back();
    // }

    public function destroy($id)
    {
        //
    }
}
