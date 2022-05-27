<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         if (session()->has('LoggedUser')) {
            $user = DB::table('users')->where('id', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$user,
                'title'=>'Peserta | Our Arisan'

            ];

        }

      
    
        $pesertas = DB::table('pesertas')->paginate(5);
        return view('pesertas.peserta', $data, compact('pesertas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nm_peserta'=>'required',
            'alamat'=>'required',
            'no_tlp'=>'required'
        ]);

        $save = Peserta::create([
            'nm_peserta'=>$request->nm_peserta,
            'alamat'=>$request->alamat,
            'no_tlp'=>$request->no_tlp
        ]);

        $save_status = DB::table('statuss')->insert([
            'nm_peserta'=>$request->nm_peserta,
            'alamat'=>$request->alamat,
            'no_tlp'=>$request->no_tlp,
            'status'=>'belum lunas'
        ]);

        if ($save && $save_status) {
            return back()->with('success','Data Sukses Disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (session()->has('LoggedUser')) {
            $user = DB::table('users')->where('id', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$user,
                'title'=>'Edit Data | Our Arisan'
            ];
        }

        $peserta_fetch = Peserta::find($id);
        return view('pesertas.edit', $data, compact('peserta_fetch'));
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
      $request->validate([
            'nm_peserta'=>'required',
            'alamat'=>'required',
            'no_tlp'=>'required'
        ]);

      $peserta_fetch = Peserta::find($id);
      $peserta_fetch->update([
        'nm_peserta'=>$request->nm_peserta,
        'alamat'=>$request->alamat,
        'no_tlp'=>$request->no_tlp
      ]);

      $update = DB::table('statuss')->where('id', $request->id)->update([
        'nm_peserta'=>$request->nm_peserta,
        'alamat'=>$request->alamat,
        'no_tlp'=>$request->no_tlp
      ]);

      return back()->with('success','Data Sukses Diedit');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peserta_fetch = Peserta::find($id);
        $peserta_fetch->delete();

        $delete_status = DB::table('statuss')->where('id',$id)->delete();

        return back()->with('success','Data Sukses Dihapus');

    }
}
