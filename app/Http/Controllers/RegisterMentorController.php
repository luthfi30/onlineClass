<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class RegisterMentorController extends Controller
{
    public function register(){
        $data = user::all();
         return view('auth.registerMentor',compact('data'));
    }

     public function store(Request $request){

     
       $request->validate([
           'name'  => 'required',
           'role'  => 'required',
           'email'  => 'required', 
            'cv'    => 'required|mimes:pdf,xlx,csv,docx,zip|max:2048',
        ]);
          $input = $request->all();

         if ($cv = $request->file('cv')) {
            $destinationPath = 'image/';
            $filecv = date('YmdHis') . "." . $cv->getClientOriginalExtension();
            $cv->move($destinationPath, $filecv);
        }

         User::create([
             'name' => $request->name,
             'profession' => $request->profession,
             'role' => $request->role,
             'no_hp' => $request->no_hp,
             'email' => $request->email,
             'password' =>Hash::make($request->password),
             'cv' => $filecv,
         ]);

        return back()
            ->with('success', 'Pendaftaran Berhasil, selanjutnya proses pendaftaran aakan di review oleh admin');
           
    }
}
