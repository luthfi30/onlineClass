<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Course;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapter = Chapter::paginate(10);
        return view('admin.chapter.index', compact('chapter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = Course::get(['id','title']);
        return view('admin.chapter.create', compact('course'));
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
            'name'      => 'required',
            'course_id' => 'required'
        ]);

        Chapter::create([
            'name'      => $request->name,
            'course_id' => $request->course_id
        ]);

        return redirect()->back()->with('success','Chapter baru berhasil ditambahkan');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chapter = Chapter::findorfail($id);
        $course = Course::get(['id','title']);
        return view('admin.chapter.edit', compact('chapter','course'));
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
            
            'name'      => 'required',
            'course_id' => 'required'
            
            ]);

        $chapter = Chapter::find($id)->update([
            'name' => $request->name,
            'course-id' => $request->course_id
        ]); 

        return redirect()->back()->with('success','Data Chapter Berhasil di Update');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Chapter::destroy($id);
        return  redirect()->back()->with('success','Data kategori berhasil dihapus') ;
    }
}
