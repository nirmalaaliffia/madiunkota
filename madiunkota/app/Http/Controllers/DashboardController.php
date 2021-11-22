<?php

namespace App\Http\Controllers;

use App\Models\berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
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
    public function index(){
        $ipkd= DB::select(DB::raw(" select count(id) as jumlah_ipkd from ipkds"));
        $user= DB::select(DB::raw(" select count(id) as jumlah_user from users"));
        $opd= DB::select(DB::raw(" select count(id) as jumlah_opd from opds"));
        $berita= DB::select(DB::raw("select count(bk.id) as jumlah_berita from berita_kategoris bk where bk.id_kategori =1"));
        $tabloid= DB::select(DB::raw("select count(bk.id) as jumlah_tabloid from berita_kategoris bk where bk.id_kategori =2"));
        $pengumuman= DB::select(DB::raw("select count(bk.id) as jumlah_pengumuman from berita_kategoris bk where bk.id_kategori =3"));
        $lowongan= DB::select(DB::raw("select count(bk.id) as jumlah_lowongan from berita_kategoris bk where bk.id_kategori =4"));
        $arsip= DB::select(DB::raw("select count(bk.id) as jumlah_arsip from berita_kategoris bk where bk.id_kategori =5"));
        $dokumen= DB::select(DB::raw("select count(bk.id) as jumlah_dokumen from berita_kategoris bk where bk.id_kategori =6"));
        $informasi= DB::select(DB::raw("select count(bk.id) as jumlah_informasi from berita_kategoris bk where bk.id_kategori =7"));
        $kegiatan_pemkot= DB::select(DB::raw("select count(bk.id) as jumlah_kegiatan_pemkot from berita_kategoris bk where bk.id_kategori =8"));
        $kegiatan_walikota= DB::select(DB::raw("select count(bk.id) as jumlah_kegiatan_walikota from berita_kategoris bk where bk.id_kategori =9"));

        return view('admin/dashboard',[
            "title" => "Dashboard",
            "parent" => "dashboard",
           "child" => "",
           "root_parent" => "/admin",
           'ipkd' => $ipkd,
           'user' => $user,
           'opd' => $opd,
           'berita' => $berita,
           'tabloid' => $tabloid,
           'pengumuman' => $pengumuman,
           'lowongan' => $lowongan,
           'arsip' => $arsip,
           'dokumen' => $dokumen,
           'informasi' => $informasi,
           'kegiatan_pemkot' => $kegiatan_pemkot,
           'kegiatan_walikota' => $kegiatan_walikota
            
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
     * @param  \App\Models\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(berita $berita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, berita $berita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(berita $berita)
    {
        //
    }
}
