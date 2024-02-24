<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Forum;
use App\Models\Course;
use App\Models\MyCourse;
use App\Models\Comment;

use App\User;
use Auth;

class myForumController extends Controller
{
     public function index( )
    {
        $id = Auth::user()->id;
        
        $data = Course::whereHas('mycourse', function ($query) {
        $query->where('my_courses.user_id',Auth::user()->id);
        })->paginate(10);
   
     
        return view('mycourse.forum.index', compact('data'));
      
    }

      public function show($id)
    {
        $forum = Forum::where('mycourse_id',$id)->orderBy('created_at','desc')->paginate(10);
        $course = MyCourse::where('id',$id)->first();
       
        return view('mycourse.forum.show', compact('forum' ,'course'));
    }

     public function view(Forum $forum)
    {
       
        $data = Comment::where('forum_id', $forum->id)->count();
      
        return view('mycourse.forum.view', compact('forum','data'));
    }

     public function store(Request $request)
    {
        Forum::create([
			'judul'        => $request->judul,
             'slug'        => Str::slug($request->judul, '-'),
			'konten'       => $request->konten,
            'mycourse_id'  => $request->mycourse_id,
            'user_id'      => auth()->user()->id,
          
		]);
       
        return redirect()->back()->with('success','data post berhasil di tambahkan');

    }

     public function postKomentar(Request $request)
    {

        $request->request->add(['user_id' => Auth()->user()->id]);
        $komentar = Comment::create($request->all());
       
        return redirect()->back()->with('success','data post berhasil di tambahkan');

    }


     public function editForum(Forum $forum)
    {
        
       $item =  Forum::findorfail($forum->id);
         $course = myCourse::where('id',$forum->mycourse_id)->first();
   
         return view('mycourse.forum.edit', compact('item','course'));

    }

    public function updateforum(Request $request, $id)
{
    $update_forum = Forum::find($id);
    $update_forum->judul = $request->judul;
    $update_forum->slug =  Str::slug($request->judul, '-');
    $update_forum->konten = $request->konten;
    $update_forum->mycourse_id = $request->mycourse_id;
    $update_forum->user_id =auth()->user()->id;
    $update_forum->save();
    return redirect()->back()->with('success','data post berhasil diubah');
}

    public function destroyKomentar($id)
    {
       $forum = Forum::destroy($id);
       return redirect()->back()->with('success','Course berhasil di delete');
      
    }

}
