<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('login');
    }

    public function registerPage()
    {
        return view('register');
    }

    public function editProfile()
    {
        $id = auth()->id();
        $details = DB::table('users')
        ->where('id','LIKE',$id)
        ->get();
        return view('Profile/editProfile',compact('details'));
    }

    public function editformP(Request $request)
    {
        //$actor = $request->all();

        $request->validate([
            'username' => 'required',
            'email' => 'required|email:dns',
            'dob' => 'required',
            'phone' => 'required|min:3|max:13',
            'image' => 'required|mimes:jpeg,jpg,png,gif',

        ]);

        $img = $request->file('image');
        $imgname = $img->getClientOriginalName();
        Storage::putFileAs('public/images',$img,$imgname);
        $imgurl = 'images/'.$imgname;

        DB::table('users')
        ->where('id',auth()->id())
        ->update([
            'username' => $request->username,
            'email' => $request->email,
            'dob' => $request->dob,
            'phone' => $request->phone,
            'image' => $imgurl,

        ]);


        return redirect('/editProfile');
    }

    public function regisAction(Request $request)
    {
        //VALIDATE INPUT
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|confirmed|min:6'
            // 'passwordConfirm' => 'required|unique:users,password,except,id',

        ]);
        // if(!Hash::check($request->get('password'), ))

        //CREATE USER
        User::create([
            'username' => $request->username,
            'email' => $request ->email,
            'password' => Hash::make($request->password)
        ]);
        //CREATE USER
        // $request->session()->flash('succes')
        return redirect("/login");
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:6'
        ]);

        $credentials =[
            'email' => $request->email,
            'password' => $request->password
        ];

        if($request->remember){
            Cookie::queue('mycookie', $request->email, 120);
        }

        if (Auth::attempt($credentials, true)) {
            return redirect('/')->withSucces('Login Success!');
        }
        return redirect()->back()->withErrors('Wrong credentials');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
