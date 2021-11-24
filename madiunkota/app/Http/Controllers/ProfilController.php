<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profil= DB::select(DB::raw("select * from profils order by id asc "));

        return view('admin/daftar_profil', [
            "title" => "Profil Kota",
            "parent" => "Profil",
            "root_parent" => "/admin",
            "child" => "",
            "profil" => $profil
           
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit($profil)
    {
        return "66";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, profil $profil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(profil $profil)
    {
        //
    }


    public function update_sejarah(request $request){
        
        $validateData = $request->validate([
            'id_sejarah' => 'required',
            'deskripsi_sejarah' =>'required'
        ]);

        $validateData['user_id'] = auth()->user()->id;

        DB::table('profils')->where('id', $validateData['id_sejarah'])
        ->update(array(
          'deskripsi' => $validateData['deskripsi_sejarah'],
          'id_pengirim' => $validateData['user_id'],
          'updated_at' => Carbon::now()
         ));
        return redirect('/admin/profil')->with('success', 'profil Sejarah berhasil diupdate !');
    }

    public function update_visi_misi(request $request){
        $validateData = $request->validate([
            'id_visi_misi' => 'required',
            'visi_misi' =>'required'
        ]);

        $validateData['user_id'] = auth()->user()->id;

        DB::table('profils')->where('id', $validateData['id_visi_misi'])
        ->update(array(
          'deskripsi' => $validateData['visi_misi'],
          'id_pengirim' => $validateData['user_id'],
          'updated_at' => Carbon::now()
         ));
        return redirect('/admin/profil')->with('success', 'profil Visi Misi baru berhasil diupdate !');
    }

    public function update_profil_pimpinan(request $request){
        $validateData = $request->validate([
            'id_profil_pimpinan' => 'required',
            'profil_pimpinan' =>'required'
        ]);

        $validateData['user_id'] = auth()->user()->id;

        DB::table('profils')->where('id', $validateData['id_profil_pimpinan'])
        ->update(array(
          'deskripsi' => $validateData['profil_pimpinan'],
          'id_pengirim' => $validateData['user_id'],
          'updated_at' => Carbon::now()
         ));
        return redirect('/admin/profil')->with('success', 'profil Pimpinan berhasil diupdate !');
    }


    public function update_wilayah_geografis(request $request){
        $validateData = $request->validate([
            'id_wilayah_geo' => 'required',
            'wilayah_geografis' =>'required'
        ]);

        $validateData['user_id'] = auth()->user()->id;

        DB::table('profils')->where('id', $validateData['id_wilayah_geo'])
        ->update(array(
          'deskripsi' => $validateData['wilayah_geografis'],
          'id_pengirim' => $validateData['user_id'],
          'updated_at' => Carbon::now()
         ));
        return redirect('/admin/profil')->with('success', 'profil Wilayah Geografis berhasil diupdate !');
    }
}
