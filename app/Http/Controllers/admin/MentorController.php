<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

use Carbon\Carbon;
use PDF;
class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mentor = User::where('role','mentor')->paginate(10);
        return view('admin.mentor.index',compact('mentor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mentor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function changeStatus($id)
    {
        $data = User::where('id',$id)->first();
        $status_sekarang = $data->status;

        if($status_sekarang == 1){
            User::where('id',$id)->update(['status'=>0]);
        }else{
            User::where('id',$id)->update(['status'=>1]);
        }
  
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'          => 'required',
            'profile'       => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'email'         => 'required',
            'profession'    => 'required',
        ]);

        if($request->hasFile('profile')){
            $file = $request->file('profile');
 
            $nama_file = time()."_".$file->getClientOriginalName();
     
                      // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$nama_file);
            User::create([
                'name' => $request->name,
                'profession' => $request->profession,
                'avatar' => $nama_file,
                'role'  => 'mentor',
                'email' => $request->email,
                'password' => Hash::make($request['password']),
                
            ]);
            }else{
                User::create([
                    'name' => $request->name,
                    'profession' => $request->profession,
                    'role'  => 'mentor',
                    'email' => $request->email,
                    'password' => Hash::make($request['password']),
                ]);
            }
            return redirect()->back()->with('success','Mentor baru berhasil di tambahkan');    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findorfail($id);
        // $kelas = User::with('course')->where('id','mentor_id')->get();
        $kelas = DB::table('courses')
        ->leftjoin('users', 'courses.mentor_id', '=', 'users.id')
        ->select('courses.*', 'courses.title')
        ->where('courses.mentor_id',$user->id)->get();

         $totalrevenue = DB::table('courses')
         ->join('my_courses', 'courses.id', '=', 'my_courses.course_id')
         ->select(DB::raw('SUM(my_courses.item_price*40/100) as pendapatan'))
         ->join('users', 'courses.mentor_id', '=', 'users.id')
         ->where('courses.mentor_id',$id)
        ->first();

        $revenue =  DB::table('courses')
        ->leftjoin('users', 'courses.mentor_id', '=', 'users.id')
        ->leftjoin('my_courses', 'courses.id', '=', 'my_courses.course_id')
        ->select('courses.*', 'courses.title')
        ->select('my_courses.course_id','courses.title','my_courses.item_price','my_courses.created_at', DB::raw('SUM(my_courses.item_price*40/100) as pendapatan') ,DB::raw('COUNT(my_courses.course_id) as total_terjual'))
        ->where('courses.mentor_id',$user->id)
        ->groupBy('my_courses.course_id','courses.title','my_courses.item_price','my_courses.created_at')
        ->orderBy('pendapatan')->get();
        
       
        
        return view('admin.mentor.show',compact('user','kelas','revenue','totalrevenue'));
    }

    public function laporanRevenue(){
          $mentor = User::where('role','mentor')->paginate(10);
        return view('admin.mentor.laporanDataRevenue', compact('mentor'));
    }
    public function dateLaporanRevenue($id){
        $user = User::findOrFail($id);
         return view('admin.mentor.laporanRevenue',compact('user'));
    }
    public function cetakLaporanRevenue(Request $request){

        $id = $request->query('id');
        $user = User::findOrFail($id);
      
        if (request()->start_date || request()->end_date) {
        $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
        $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
        $revenue =  DB::table('courses')
        ->leftjoin('users', 'courses.mentor_id', '=', 'users.id')
        ->leftjoin('my_courses', 'courses.id', '=', 'my_courses.course_id')
        ->select('courses.*', 'courses.title')
        ->select('my_courses.course_id','courses.title','my_courses.item_price','my_courses.created_at', DB::raw('SUM(my_courses.item_price*40/100) as pendapatan') ,DB::raw('COUNT(my_courses.course_id) as total_terjual'))
        ->where('courses.mentor_id',$user->id)
        ->whereBetween('my_courses.created_at',[$start_date,$end_date])
        ->groupBy('my_courses.course_id','courses.title','my_courses.item_price','my_courses.created_at')
        ->orderBy('pendapatan')->get();
        
          $totalrevenue = DB::table('courses')
         ->join('my_courses', 'courses.id', '=', 'my_courses.course_id')
         ->select(DB::raw('SUM(my_courses.item_price*40/100) as pendapatan'))
         ->join('users', 'courses.mentor_id', '=', 'users.id')
         ->where('courses.mentor_id',$user->id)
          ->whereBetween('my_courses.created_at',[$start_date,$end_date])
        ->first();

        $pdf = PDF::loadview('admin.mentor.revenue_pdf',compact('revenue','user','totalrevenue'))->setOptions(['defaultFont' => 'sans-serif']);
    	return $pdf->stream('laporan_Data_Transaksi.pdf');

        }
    
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mentor = User::findorfail($id);
        return view('admin.mentor.edit',compact('mentor'));
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
            'name'          => 'required',
            'profile'       => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'email'         => 'required',
            'profession'    => 'required'
        ]);

        if($request->hasFile('profile')){
            $file = $request->file('profile');
 
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
            return redirect()->back()->with('success','Data Mentor berhasil di Update');    
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mentor = User::destroy($id);
        return redirect()->back()->with('success','Data Mentor Berhasil Di Hapus');
    }

  
}
