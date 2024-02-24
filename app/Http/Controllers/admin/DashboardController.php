<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\MyCourse;
use App\Models\Course;
use App\User;
use Auth;


class DashboardController extends Controller
{
    function index(){
      
        $maxuser =  User::where('role','student')->count();  
        $maxmentor =  User::where('role','mentor')->count();  
        $transaction =  Order::where('status','success')->count();  
        $totalsales =  Order::where('status','success')->select(DB::raw('sum(price + kode) as totalsales'))->first(); 
        $mycourse = MyCourse::where('status','success')->get();
        $course = Course::where('status','published')->get();
        //Chart data
        $mycourses = DB::table('my_courses')
        ->select('my_courses.course_id','courses.title', DB::raw('count(my_courses.course_id) as total_terjual'))
        ->leftjoin('orders', 'my_courses.order_id', '=', 'orders.id')
        ->leftjoin('courses', 'my_courses.course_id', '=', 'courses.id')
        ->where('my_courses.status','success')
        ->groupBy('my_courses.course_id','courses.title')
        ->orderBy('total_terjual')->get();

        // dd($mycourses);
        $chartName = [];
        $chartPrice = [];

        foreach($mycourses as $m){
            $chartPrice[] = $m->total_terjual;
            $chartName[] = $m->title;
        }


        return view('admin.dashboard.index',compact('maxuser','maxmentor','transaction','totalsales','chartName','chartPrice'));
    }
}
