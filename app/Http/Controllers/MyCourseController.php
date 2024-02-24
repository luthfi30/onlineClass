<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use setasign\Fpdi\Fpdi;
use App\Models\Lesson;
use App\Models\Course;
use App\Models\MyCourse;
use App\Models\Certificate;
use App\Models\Order;
use App\Models\Chapter;
use App\User;
use Auth;
use File;


class MyCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        
        return view('mycourse.course.userProfile',compact('user'));
        
    }


  

    public function showCourse(Request $request)
    {       
        
            // $order_id = Order::pluck('id');
            // $data = MyCourse::whereHas('order', function ($query) use ($order_id) {
            //     $query->where('orders.id',$order_id)->where('orders.status','success');
            // })->where('user_id', $request->id)->with('course')->get();
           
            $data = DB::table('my_courses')
            ->leftjoin('orders', 'my_courses.order_id', '=', 'orders.id')
            ->leftjoin('courses', 'my_courses.course_id', '=', 'courses.id')
            ->leftjoin('users', 'my_courses.user_id', '=', 'users.id')
            ->select('courses.*', 'my_courses.id as mycourse_id','courses.id as courseid')->where('courses.status','published')
            ->where('orders.status','success')->where('my_courses.user_id', $request->id)->get();
            
   
            return view('mycourse.course.index', compact('data'));
        
        
    }

    public function update(Request $request, $id)
    {
      
        if($request->password == ''){
                
            if ($request->hasFile('avatar')){
            $file = $request->file('avatar');
            
            $nama_file = time()."_".$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$nama_file);
                User::find($id)->update([
                    'name' => $request->name,
                    'profession' => $request->profession,
                    'avatar' => $nama_file,
                    'role'  => $request->role,
                    'email' => $request->email
                ]);
            }else{
                User::find($id)->update([
                    'name' => $request->name,
                    'profession' => $request->profession,
                    'role'  => $request->role,
                    'email' => $request->email
                ]);
            }
    }
           return redirect()->back()->with('success','User Admin berhasil di Update'); 
    }

   
    // student account
   
    public function account()
    {   
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('mycourse.course.password',compact('user'));
    }

    public function resetPassword(Request $request, $id){

        if($request->password == ''){
            return redirect('/my-course/account')->with('status','Password tidak dirubah');
                
        }else{
           User::find($id)->update([
            
            'email' => $request->email,
            'password' => Hash::make($request['password']),
           ]);
        }
        return redirect('/my-course/account')->with('success','Password Berhasil Di Rubah ');
    }
   
    // project certificate

    public function getCertificate(){
        

        $id = Auth::user()->id;
        $certi = Certificate::all();
        $user = User::find($id);
        $data = MyCourse::where('user_id', $id)->with('course')->get();
        return view('mycourse.certificate.index',compact('user','data','certi'));

    }

     public function Certificate($id){

        $userid = Auth::user()->id;
       
        $certi = Certificate::where('id', $id)->first();
         $data = MyCourse::where('id', $certi->mycourse_id)->with('course')->first();
         
        $name = $certi->username;
        $courseName = $data->course->title;
        $outputfile = public_path().'dc.pdf';
        $this->fillPDF(public_path().'/data_file/dc.pdf',$outputfile,$name,$courseName);

        return response()->file($outputfile);

    }

      public function fillPDF($file,$outputfile,$name,$courseName){

        $fpdi = new FPDI;
        $fpdi->setSourceFile($file);
        $template = $fpdi->importPage(1);
        $size = $fpdi->getTemplateSize($template);
        $fpdi->AddPage($size['orientation'],array($size['width'],$size['height']));
        $fpdi->useTemplate($template);
        $top = 65;
        $right = 97;
        $nama = $name ;
        $courseNama = $courseName;
        $ctop = 90;
        $cright = 32;
        // $fpdi->setFont("helvetica","",20);
        $fpdi->setFont("helvetica","",18);
        $fpdi->setTextColor(25,26,25);
        $fpdi->Text($right,$top,$nama);
        $fpdi->Text($cright,$ctop,$courseNama);
        return $fpdi->Output($outputfile,'F');

    }

    public function storeCertificate(Request $request){

        if($request->hasFile('image1')){
            $file = $request->file('image1');
            $nama_file = time()."_".$file->getClientOriginalName();
                      // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$nama_file);
        Certificate::create([
			'image1'        => $nama_file,
			'username'      => $request->username,
            'email'         => $request->email,
            'mycourse_id'   => $request->mycourse_id,
            'link_project'  => $request->link_project
		]);
        }else{
            Certificate::create([
                'username'      => $request->username,
                'email'         => $request->email,
                'mycourse_id'   => $request->mycourse_id,
                'link_project'  => $request->link_project,
                'description'   => $request->description
            ]);
        }
        return redirect()->back()->with('success','data certificate berhasil di tambahkan');

    }

    public function editProject($id)
    {
        $user =  Auth::user()->id;
        $course = DB::table('certificates')
        ->leftjoin('my_courses', 'certificates.mycourse_id', '=', 'my_courses.id')
        ->leftjoin('courses', 'my_courses.course_id', '=', 'courses.id')
        ->select('certificates.*', 'courses.title')
        ->where('certificates.id',$id)->orderBy('certificates.id', 'ASC')->get();
        $data =  Certificate::findorfail($id);
        
        
        return view('mycourse.certificate.editProject', compact('data','course'));
    }

    public function updateProject(Request $request, $id)
    {
                
        if($request->hasFile('image1')){

            $file = $request->file('image1');
            $nama_file = time()."_".$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'data_file';
            // isi dengan nama folder tempat kemana file diupload
            $file->move($tujuan_upload,$nama_file);
            Certificate::find($id)->update([
                'image1'        => $nama_file,
                'username'      => $request->username,
                'email'         => $request->email,
                'mycourse_id'   => $request->mycourse_id,
                'link_project'  => $request->link_project,
                'description'   => $request->description
               
            ]);
            
        }else{
            Certificate::find($id)->update([
                'username'    => $request->username,
                'email'       => $request->email,
                'mycourse_id' => $request->mycourse_id,
                'link_project'=> $request->link_project,
                'description'   => $request->description
            ]);
            
        }
        return redirect()->back()->with('success','data certificate berhasil di tambahkan');
    }

    public function destroyProject($id)
    {
        $lesson = Certificate::destroy($id);
        return redirect()->back()->with('success','Data Project Berhasil di Delete');
    }

    public function getProject()
    {
        $id   = Auth::user()->email; 
        $data = DB::table('certificates')
        ->leftjoin('my_courses', 'certificates.mycourse_id', '=', 'my_courses.id')
        ->leftjoin('courses', 'my_courses.course_id', '=', 'courses.id')
        ->select('certificates.*', 'courses.title')
        ->where('certificates.email',$id)->orderBy('certificates.id', 'ASC')->get();
       
        return view('mycourse.certificate.dataProject', compact('data'));
    }
   
    public function showcase()
    {
        $data = DB::table('certificates')
        ->leftjoin('my_courses', 'certificates.mycourse_id', '=', 'my_courses.id')
        ->leftjoin('courses', 'my_courses.course_id', '=', 'courses.id')
        ->select('certificates.*', 'courses.title')
        ->where('certificates.status','success')
        ->orderBy('certificates.id', 'ASC')->get();

        return view('frontpanel.home.showcase', compact('data'));
    }

      public function getDownload($file_name)
{
            
         $file_path = "image/".$file_name;
        return response()->download($file_path);
           
}
}
