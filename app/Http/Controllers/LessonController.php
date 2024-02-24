<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Chapter;
use App\Models\Course;

class LessonController extends Controller
{

 

    public function index($id){
       
      
        $chapter = Chapter::where('course_id',$id)->with('lesson')->orderBy('id','asc')->get();
        $data = Lesson::where('id', $id)->get();
        
        return view('lesson.dashboard.index',compact('chapter','data'));
    }

    public function show($id, $lessonid){
       
      
        $chapter = Chapter::where('course_id',$id)->with('lesson')->orderBy('id','asc')->get();
        $data = Lesson::where('id', $lessonid)->get();
        
        $c = Course::with('lesson')->find($id);
        $totalvideo = chapter::count();
  

        return view('lesson.dashboard.index',compact('chapter','data','c','totalvideo'));
    }

    


   
   
    
}
