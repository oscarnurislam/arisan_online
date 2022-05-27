<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserProfileController extends Controller
{
    function profile()
    {
    	if (session()->has('LoggedUser')) {
    		$user = DB::table('users')->where('id', session('LoggedUser'))->first();
    		$data = [
    			'LoggedUserInfo'=>$user
    		];

    		$title = ['title'=>'Profile | Arisan'];
    		return view('admin.profile', $data, $title);
    	}
    }

    function update(Request $request, $id)
    {
    	$request->validate([
    		'name'=>'required',
    		'email'=>'required|email',
    		'password'=>'required|min:6|max:12'
    	]);

    	DB::table('users')->where('id', $id)->update([
    		'name'=>$request->name,
    		'email'=>$request->email,
    		'password'=>Hash::make($request->password)
    	]);

    	return redirect('profile')->with('success','Data Edited Successfully');
    }
}
