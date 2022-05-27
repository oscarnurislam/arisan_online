<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setoran;
use Illuminate\Support\Facades\DB;

class KocokController extends Controller
{
    function kocok()
    {
    	if (session()->has('LoggedUser')) {
    		$user = DB::table('users')->where('id', session('LoggedUser'))->first();
    		$data = [
    			'LoggedUserInfo'=>$user,
    			'title'=>'Kocok Hasil | Our Arisan'
    		];

     	}

     	return view('kocoks.kocok', $data);

    }

    function hasil()
    {
    	if (session()->has('LoggedUser')) {
    		$user = DB::table('users')->where('id', session('LoggedUser'))->first();
    		$data = [
    			'LoggedUserInfo'=>$user,
    			'title'=>' Hasil | Our Arisan'
    		];

     	}

     	$count_saldo = DB::table('setorans')->sum('jml_setoran');
     	$setorans = DB::table('setorans')->select('nm_peserta')->inRandomOrder()->limit(1)->get();
     	return view('kocoks.hasil', $data, compact('setorans','count_saldo'));

    }

    function delete()
    {
    	$delete_setoran = DB::table('setorans')->delete();
    	$update_status = DB::table('statuss')->update(['status'=>'belum lunas']);
    	if ($delete_setoran && $update_status) {
    		return redirect('welcome');
    	}else{
    		echo "Error";
    	}
    }
}
