<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('role','admin')->paginate(10);
        return view('admin.useradmin.index',compact('user'));
    }

    public function indexStudent()
    {
        $user = User::where('role','student')->paginate(10);
        return view('admin.student.index',compact('user'));
    }

    public function showStudent($id)
    {
        $user = User::findorfail($id);
         $kelas = DB::table('my_courses')
            ->leftjoin('orders', 'my_courses.order_id', '=', 'orders.id')
            ->leftjoin('courses', 'my_courses.course_id', '=', 'courses.id')
            ->leftjoin('users', 'my_courses.user_id', '=', 'users.id')
            ->select('courses.*', 'my_courses.id as mycourse_id','courses.id as courseid')
            ->where('orders.status','success')->where('my_courses.user_id', $user->id)->get();

        return view('admin.student.show',compact('user','kelas'));
    }
    
  
    public function create()
    {
        return view('admin.useradmin.create');
    }

    public function createStudent()
    {
        return view('admin.student.create');
    }


     public function storeStudent(Request $request)
    {
       $this->validate($request,[
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8'],
       ]);
       if ($request->hasFile('avatar')){
        $file = $request->file('avatar');
        $nama_file = time()."_".$file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);
       User::create([
        'name' => $request->name,
        'profession' => $request->profession,
        'avatar' => $request->avatar,
        'role'  => $request->role,
        'email' => $request->email,
        'password' => Hash::make($request['password']),
       ]);
    }else{
        User::create([
            'name' => $request->name,
            'profession' => $request->profession,
            'role'  => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
        ]);
    }

       return redirect()->back()->with('success','User Student baru berhasil di tambahkan'); 
    }

    public function store(Request $request)
    {
       $this->validate($request,[
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8'],
       ]);
       if ($request->hasFile('avatar')){
        $file = $request->file('avatar');
        $nama_file = time()."_".$file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);
       User::create([
        'name' => $request->name,
        'profession' => $request->profession,
        'avatar' => $request->avatar,
        'role'  => $request->role,
        'email' => $request->email,
        'password' => Hash::make($request['password']),
       ]);
    }else{
        User::create([
            'name' => $request->name,
            'profession' => $request->profession,
            'role'  => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
        ]);
    }

       return redirect()->back()->with('success','User Admin baru berhasil di tambahkan'); 
       
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
        return view('admin.useradmin.show',compact('user'));
    }

    public function getDownload($file_name)
{
            
         $file_path = public_path('image/'.$file_name);
        return response()->download($file_path);
           
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorfail($id);
        return view('admin.useradmin.edit',compact('user'));
    }

    public function editStudent($id)
    {
        $user = User::findorfail($id);
        return view('admin.student.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function studentUpdate(Request $request, $id)
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
                'role'  => $request->role,
                'email' => $request->email
            ]);
                
        }else{
           User::find($id)->update([
            'name' => $request->name,
            'profession' => $request->profession,
            'avatar' => $request->avatar,
            'role'  => $request->role,
            'email' => $request->email,
            
           ]);
        }
    
           return redirect()->back()->with('success','User Admin berhasil di Update'); 
    }

    public function update(Request $request, $id)
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
                'role'  => $request->role,
                'email' => $request->email
            ]);
                
        }else{
           User::find($id)->update([
            'name' => $request->name,
            'profession' => $request->profession,
            'avatar' => $request->avatar,
            'role'  => $request->role,
            'email' => $request->email,
            
           ]);
        }
    
           return redirect()->back()->with('success','User Admin berhasil di Update'); 
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
        return redirect()->back()->with('success','Data Password Berhasil Di Hapus');
    }

    public function studentDestroy($id)
    {
        $mentor = User::destroy($id);
        return redirect()->back()->with('success','Data Password Berhasil Di Hapus');
    }

    public function password(){
          
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.useradmin.password',compact('user'));
    }

    public function ressetPassword(Request $request, $id){
        if($request->password == ''){
            return redirect()->back()->with('success','Data Tidak Di update');        

            }else{
               User::find($id)->update([
                'email' => $request->email,
                'password' => Hash::make($request['password']),
               ]);
            }
            return redirect()->back()->with('success','Data Password Berhasil Di Ubah');
    }
}
