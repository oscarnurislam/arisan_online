<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

// use App\Models\User;

class UserAuthController extends Controller
{
    function register()
    {

    	return view('auths.register');
    }

    function create(Request $request)
    {
    	$request->validate([
    		'name'=>'required',
    		'email'=>'required|email|unique:users',
    		'password'=>'required|min:6|max:12'
    	]);

    	$query = DB::table('users')
    			->insert([
    				'name'=>$request->name,
    				'email'=>$request->email,
    				'password'=>Hash::make($request->password)
    			]);
    	if ($query) {
            return redirect()->route('auth.login')->with('success', ' Akun Anda Sudah Tersedia');
    	}else{
            return redirect()->route('auth.login')->with('fail', 'Ada Yang Bermasalah Dengan Inputtan Anda!');
        }
    }

    function check(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:12'
        ]);

         $user = DB::table('users')->where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('LoggedUser', $user->id);
                return redirect('welcome');

            }else{
                return back()->with('fail','invalid password');
            }
        }else{
            return back()->with('fail', 'No Account Found For This Email');
        }   
    }

    function welcome()
    {
        if (session()->has('LoggedUser')) {
            // $user = User::where('id','=',session('LoggedUser'))->first();
            $user = DB::table('users')->where('id', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$user,
                'title'=>'Dashboard | Our Arisan'
            ];


        }

        $count_admin = DB::table('users')->select('id')->count();
        $count_peserta = DB::table('pesertas')->select("id")->count();
        $count_setoran = DB::table('setorans')->sum('jml_setoran');


       
        return view('admin.welcome', $data, compact('count_peserta', 'count_setoran', 'count_admin'));
    }

    function logout()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect()->route('awal');
        }
    }

    function login()
    {
        return view('auths.login');
    }
}
