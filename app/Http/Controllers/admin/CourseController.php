<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Mentor;
use App\Models\Chapter;
use App\Models\Lesson;
use App\Models\Category;
use App\user;
use PDF;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $course = Course::paginate(10);
       
        return view('admin.course.index', compact('course'));
    }

     public function cetakCourse()
    {
        $course = Course::all();
        $pdf = PDF::loadview('admin.course.course_pdf',compact('course'))->setOptions(['defaultFont' => 'sans-serif'])->setPaper('a4', 'landscape');
    	return $pdf->stream('laporan_Data_Course.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mentor = User::get(['id','name']);
        $category = Category::get(['id','name']);
        return view('admin.course.create',compact('mentor','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
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
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::with('category')->findorfail($id);

        $chapter = DB::table('chapters')
        ->leftjoin('courses', 'courses.id', '=', 'chapters.course_id')
        ->leftjoin('lessons', 'chapters.id', '=', 'lessons.chapter_id')
        ->select('chapters.name AS cname','lessons.name As lename')
        ->where('courses.id',$id)->get();
        

        return view('admin.course.show', compact('course','chapter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findorfail($id);
        $mentor     = User::where('role','mentor')->get(['id','name']);
       
        $category   = Category::get(['id','name']);
        return view('admin.course.edit', compact('course','category','mentor'));
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
        unlink("data_file/".$image->thumbnail);
        $file = $request->file('thumbnail');
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);
        Course::find($id)->update([
			'thumbnail'     => $nama_file,
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
    public function destroy($id)
    {
       $image = Course::find($id);
       if($image->thumnail != "")
       {
            unlink("data_file/".$image->thumbnail);
       }

       $course = Course::destroy($id);
       return redirect()->back()->with('success','Course berhasil di delete');
    }
}
