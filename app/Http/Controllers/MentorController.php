<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\MyCourse;
use App\Models\Mentor;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\Lesson;
use App\Models\Order;
use App\Models\Certificate;
use App\User;
use Auth;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class MentorController extends Controller
{
    
    public function index()
    {
         $id = Auth::user()->id;
        $maxuser =  DB::table('my_courses')
         ->leftjoin('courses', 'my_courses.course_id', '=', 'courses.id')
         ->leftjoin('users','my_courses.user_id' , '=', 'users.id')
         ->select('users.*')
         ->where('courses.mentor_id',$id)
         ->count();  
        $maxclass = Course::where('mentor_id', $id)->count(); 
        $transaction = Course::with(['order','MyCourse'])->where('mentor_id',$id)->count();

       $totalrevenue = DB::table('courses')
         ->join('my_courses', 'courses.id', '=', 'my_courses.course_id')
         ->select(DB::raw('SUM(my_courses.item_price*40/100) as pendapatan'))
         ->join('users', 'courses.mentor_id', '=', 'users.id')
         ->where('courses.mentor_id',$id)
        ->first();
     
           
         $chartName = [];
        $chartPrice = [];
       
       
        
        return view('mentor.dashboard.index',compact('maxuser','maxclass','totalrevenue','transaction','chartName'));
    }



     public function showMentorCourse()
     {
         $id = Auth::user()->id;
         $data = Course::where('mentor_id', $id)->paginate(10);
         return view('mentor.course.index',compact('data'));   
     }

    public function detailMentorCourse($id)
     {
         $course = Course::findorfail($id);  
         $data = DB::table('my_courses')
         ->leftjoin('courses', 'courses.id', '=', 'my_courses.course_id')
         ->leftjoin('users', 'users.id', '=', 'my_courses.user_id')
         ->select('users.*','courses.title')
         ->where('my_courses.course_id',$id)->paginate(10);

         return view('mentor.course.student',compact('data'));   
     }

     public function revenue()
     {
         $user = Auth::user()->id;
         // $kelas = User::with('course')->where('id','mentor_id')->get();
         $kelas = DB::table('courses')
         ->leftjoin('users', 'courses.mentor_id', '=', 'users.id')
         ->select('courses.*', 'courses.title')
         ->where('courses.mentor_id',$user)->get();
 
         $totalrevenue = DB::table('courses')
         ->join('my_courses', 'courses.id', '=', 'my_courses.course_id')
         ->select(DB::raw('SUM(my_courses.item_price*40/100) as pendapatan'))
         ->join('users', 'courses.mentor_id', '=', 'users.id')
         ->where('courses.mentor_id',$user)
        ->first();

         $revenue =  DB::table('courses')
         ->leftjoin('users', 'courses.mentor_id', '=', 'users.id')
         ->leftjoin('my_courses', 'courses.id', '=', 'my_courses.course_id')
         ->select('courses.*', 'courses.title')
         ->select('my_courses.course_id','courses.title','my_courses.item_price','my_courses.created_at', DB::raw('SUM(my_courses.item_price*40/100) as pendapatan') ,DB::raw('COUNT(my_courses.course_id) as total_terjual'))
         ->where('courses.mentor_id',$user)
         ->groupBy('my_courses.course_id','courses.title','my_courses.item_price','my_courses.created_at')
         ->orderBy('pendapatan')->get();
         
        
         
         return view('mentor.revenue.index',compact('user','kelas','revenue','totalrevenue'));
     }

      public function cetakRevenue()
     {
         $user = Auth::user()->id;
         // $kelas = User::with('course')->where('id','mentor_id')->get();

        $totalrevenue = DB::table('courses')
         ->join('my_courses', 'courses.id', '=', 'my_courses.course_id')
         ->select(DB::raw('SUM(my_courses.item_price*40/100) as pendapatan'))
         ->join('users', 'courses.mentor_id', '=', 'users.id')
         ->where('courses.mentor_id',$user)
        ->first();

         $revenue =  DB::table('courses')
         ->leftjoin('users', 'courses.mentor_id', '=', 'users.id')
         ->leftjoin('my_courses', 'courses.id', '=', 'my_courses.course_id')
         ->select('courses.*', 'courses.title')
         ->select('my_courses.course_id','courses.title','my_courses.item_price', DB::raw('SUM(my_courses.item_price*40/100) as pendapatan') ,DB::raw('COUNT(my_courses.course_id) as total_terjual'))
         ->where('courses.mentor_id',$user)
         ->groupBy('my_courses.course_id','courses.title','my_courses.item_price')
         ->orderBy('pendapatan')->get();
         
        $pdf = PDF::loadview('mentor.revenue.revenue_pdf',compact('revenue','totalrevenue'))->setOptions(['defaultFont' => 'sans-serif']);
    	return $pdf->stream('laporan_Data_Revenue.pdf');

     }
     

    public function createCourse()
    {   $id = Auth::user()->id;
        $mentor = User::where('id',$id)->get();
        $category = Category::get(['id','name']);
        return view('mentor.course.create',compact('mentor','category'));
    }

  
    public function storeCourse(Request $request)
    {
         $this->validate($request,[
            'thumbnail'     => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'materi'        =>  'required|mimes:pdf,xlx,csv,docx,zip|max:2048',
            'title'          => 'required|min:3,',
            'mentor_id'     => 'required',
            'category_id'   => 'required',
            'type'          => 'required',
            'status'        => 'required'    
        ]);

        if($request->hasFile('thumbnail')){
            $file = $request->file('thumbnail');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$nama_file);

            $materi = $request->file('materi');
            $filemateri = date('YmdHis') . "." . $materi->getClientOriginalExtension();
            $destinationPath = 'image/';
            $materi->move($destinationPath,$filemateri);
          

        Course::create([
			'thumbnail'     => $nama_file,
            'materi'        => $filemateri,
			'title'         => $request->title,
            'mentor_id'     => $request->mentor_id,
            'category_id'   => $request->category_id,
            'level'         => $request->level,
            'type'          => $request->type,
            'status'        => $request->status,
            'price'         => $request->price,
            'about'         => $request->about,
            'description'  => $request->description 
		]);
        }else{
            Course::create([
               
                'title'         => $request->title,
                'mentor_id'     => $request->mentor_id,
                'category_id'   => $request->category_id,
                'level'         => $request->level,
                'type'          => $request->type,
                'status'        => $request->status,
                'price'         => $request->price,
                'about'         => $request->about,
                'description'  => $request->description
            ]);
    }
    return redirect()->back()->with('success','Course baru berhasil di tambahkan');
    }
  
   
    public function editCourse($id)
    {
        $course = Course::findorfail($id);
        $idMentor = Auth::user()->id;
        $mentor = User::where('id',$idMentor)->get();
        $category   = Category::get(['id','name']);
        return view('mentor.course.edit', compact('course','category','mentor'));
    }

   
    public function updateCourse(Request $request, $id)
    {
        $this->validate($request,[
            'thumbnail'     => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'title'          => 'required|min:3,',
            'mentor_id'     => 'required',
            'category_id'   => 'required',
            'type'          => 'required',
            'status'        => 'required'    
        ]);

        if ($request->hasFile('thumbnail')){
         $image = Course::find($id);
         $image_path = "data_file".$image->thumbnail;
         if(file_exists($image_path) ){
            unlink($image_path);
        }
        
        $file = $request->file('thumbnail');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);

        // $materi = $request->file('materi');
        // $filemateri = date('YmdHis') . "." . $materi->getClientOriginalExtension();
        // $destinationPath = 'image/';
        // $materi->move($destinationPath,$filemateri);
        
        Course::find($id)->update([
			'thumbnail'     => $nama_file,
            // 'materi'        => $filemateri,
			'title'         => $request->title,
            'mentor_id'     => $request->mentor_id,
            'category_id'   => $request->category_id,
            'level'         => $request->level,
            'type'          => $request->type,
            'status'        => $request->status,
            'price'         => $request->price,
            'about'         => $request->about,
            'description'  => $request->description
		]);
        }else{
            Course::find($id)->update([
               
                'title'         => $request->title,
                'mentor_id'     => $request->mentor_id,
                'category_id'   => $request->category_id,
                'level'         => $request->level,
                'type'          => $request->type,
                'status'        => $request->status,
                'price'         => $request->price,
                'about'         => $request->about,
                'description'  => $request->description
            ]);
        }
        return redirect()->back()->with('success','Course berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyCourse($id)
    {
        $image = Course::find($id);
         $image_path = "data_file/".$image->thumbnail;
        if(file_exists($image_path) ){
            unlink($image_path);
        }
        
        $course = Course::destroy($id);
       return redirect()->back()->with('success','Course berhasil di delete');
    }
//Menampilkan Chapters
    public function showChapter()
    {
        $id = Auth::user()->id;
        // $course = Course::where('mentor_id', $id)->pluck('mentor_id');
        // $chapter = Chapter::paginate(10);
        $chapter = DB::table('chapters')
        ->leftjoin('courses', 'chapters.course_id', '=', 'courses.id')
        ->select('chapters.*', 'courses.title')
        ->where('courses.mentor_id',$id)->orderBy('courses.title', 'ASC')->paginate(10);
        return view('mentor.chapter.index', compact('chapter'));
    }

    public function createChapter()
    {
        $id = Auth::user()->id;
        $course = Course::where('mentor_id', $id)->get();
        return view('mentor.chapter.create', compact('course'));
    }

    public function storeChapter(Request $request)
    {
        $this->validate($request,[
            'name'      => 'required',
            'course_id' => 'required'
        ]);

        Chapter::create([
            'name'      => $request->name,
            'course_id' => $request->course_id
        ]);

        return redirect()->back()->with('success','Chapter baru berhasil ditambahkan');;
    }

    public function editChapter($id)
    {
        $chapter = Chapter::findorfail($id);
        $course = Course::get(['id','title']);
        return view('mentor.chapter.edit', compact('chapter','course'));
    }

    public function updateChapter(Request $request, $id)
    {
        $this->validate($request,[
            
            'name'      => 'required',
            'course_id' => 'required'
            
            ]);

        $chapter = Chapter::find($id)->update([
            'name' => $request->name,
            'course_id' => $request->course_id
        ]); 

        return redirect()->back()->with('success','Data Chapter Berhasil di Update');
    }
    public function destroyChapter($id)
    {
        $delete = Chapter::destroy($id);
        return  redirect()->back()->with('success','Data kategori berhasil dihapus') ;
    }

    //MentorCrud
    public function showLesson (){
       
        $id =  Auth::user()->id;
        $lesson = Lesson::whereHas('chapter.course', function ($query) use ($id) {
            $query->where('courses.mentor_id',$id);
        })->paginate(10);
    
        return view('mentor.lesson.index',compact('lesson'));
    }

    public function createLesson()
    {   
        $id =  Auth::user()->id;
        $chapter = Chapter::whereHas('course', function ($query) use ($id) {
            $query->where('courses.mentor_id',$id);
        })->get();
         
        return view('mentor.lesson.create',compact('chapter'));
    }

    public function storeLesson(Request $request)
    {
        $this->validate($request,[
            'name'       => 'required',
            'url_video'  => 'required',
            'chapter_id' => 'required'
        ]);

        Lesson::create([
            'name'       => $request->name,
            'url_video'  => $request->url_video,
            'chapter_id' => $request->chapter_id,
            'time' => $request->time
        ]);

        return redirect()->back()->with('success','Data Lesson Baru Berhasil di Tambahkan');
    }

   
    public function editLesson($id)
    {
        $lesson = Lesson::find($id);
        $mentorid =  Auth::user()->id;
        $chapter = Chapter::whereHas('course', function ($query) use ($mentorid) {
            $query->where('courses.mentor_id',$mentorid);
        })->get();
        return view('mentor.lesson.edit',compact('lesson','chapter'));
    }

    public function updateLesson(Request $request, $id)
    {
        $this->validate($request,[
            'name'       => 'required',
            'url_video'  => 'required',
            'chapter_id' => 'required'
        ]);

        Lesson::find($id)->update([
            'name'       => $request->name,
            'url_video'  => $request->url_video,
            'chapter_id' => $request->chapter_id,
            'time' => $request->time
        ]);

        return redirect()->back()->with('success','Data Lesson Berhasil di Update');
    }

    public function destroyLesson($id)
    {
        $lesson = Lesson::destroy($id);
        return redirect()->back()->with('success','Data Lesson Berhasil di Delete');
    }

    //Update Data Mentor

    public function account()
    {   
        $id = Auth::user()->id;
        $mentor = User::find($id);
        return view('mentor.mentor.edit',compact('mentor'));
    }

    public function updateMentor(Request $request, $id)
    {               
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
                    'role'  => 'mentor',
                    'email' => $request->email
                ]);
            }else{
                User::find($id)->update([
                    'name' => $request->name,
                    'profession' => $request->profession,
                    'role'  => 'mentor',
                    'email' => $request->email
                ]);
            }
    
           return redirect()->back()->with('success','User Admin berhasil di Update'); 
    }

    //Ubah Password Mentor

    public function password()
    {   
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('mentor.mentor.password',compact('user'));
    }

    public function resetPassword(Request $request, $id){

        if($request->password == ''){
            return redirect('/mentorPassword/password')->with('status','Password tidak dirubah');
                
        }else{
           User::find($id)->update([
            
            'email' => $request->email,
            'password' => Hash::make($request['password']),
           ]);
        }
        return redirect('mentorPassword/password')->with('success','Password Berhasil Di Rubah ');
    }

     public function certificate()
    {
        $data = DB::table('certificates')
        ->leftjoin('my_courses', 'certificates.mycourse_id', '=', 'my_courses.id')
        ->leftjoin('courses', 'my_courses.course_id', '=', 'courses.id')
        ->select('certificates.*', 'courses.title')
        ->orderBy('certificates.id', 'ASC')->paginate();
        return view('mentor.certificate.index',compact('data'));
    }


    public function changeStatusCertificate($id)
    {
        $data = Certificate::where('id',$id)->first();
        
        $status_sekarang = $data->status;

        if($status_sekarang == 'success'){
            Certificate::where('id',$id)->update(['status'=> 'pending']);
        }else{
            Certificate::where('id',$id)->update(['status'=> 'success']);
        }
  
        return redirect()->back();
    }

}
