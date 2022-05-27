<?php

namespace App\Http\Controllers;

use App\Models\Setoran;
use App\Models\Peserta;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SetoranController extends Controller
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
                'title'=>'Setoran | Our Arisan'
            ];

            $setorans = Setoran::latest()->paginate(5);
            return view('setorans.setoran', $data, compact('setorans'))->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (session()->has('LoggedUser')) {
            $user = DB::table('users')->where('id', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$user,
                'title'=>'Setoran | Our Arisan'
            ];

          

            }

            $peserta_fetch = Peserta::latest()->paginate(5);
            return view('setorans.create', $data, compact('peserta_fetch'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
        'id_peserta' => 'required|unique:setorans',
        'nm_peserta'=> 'required',
        'jml_setoran' => 'required'
        
    ];

    $mes = [
        'required' => ':attribute harus Diisi.',
        'unique' => ':attribute sudah terdaftar'
    ];

    $request->validate($rules, $mes);

    $no_setoran = rand(0, 9999);

    $save = Setoran::create([
        'id_peserta'=>$request->id_peserta,
        'nm_peserta'=>$request->nm_peserta,
        'jml_setoran'=>$request->jml_setoran,
        'tgl_setoran'=>$request->tgl_setoran
    ]);

    $update_status = DB::table('statuss')->where('id', $request->id_peserta)->update(['status'=>'sudah dibayar']);
    if ($save && $update_status) {
        return redirect()->route('setoran.index')->with('success', 'Data Sukses Disimpan');
    }else{
        return redirect()->route('setoran.index')->with('fail', 'Data gagal Disimpan');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Setoran::find($id);
        $hapus->delete();

        return back()->with('success','Data Berhasil Dihapus');
    }
}
