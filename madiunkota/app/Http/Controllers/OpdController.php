<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\opd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OpdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $opd= DB::select(DB::raw("select o.id as id_opd, o.nama_opd , o.id_bidang ,o.alamat_opd , o.no_telp , o.no_fax , bo.nama_bidang  from opds o join bidang_opds bo on bo.id =o.id_bidang  order by o.nama_opd asc "));

        $list_bidang = DB::select(DB::raw("select * from bidang_opds order by bidang_opds.nama_bidang ASC"));
        return view('admin/daftar_opd', [
            "title" => "Daftar OPD",
            "parent" => "opd",
            "child" => "",
            "root_parent" => "/admin",
            "opd" => $opd,
            "list_bidang" => $list_bidang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_bidang = DB::select(DB::raw("select * from bidang_opds order by bidang_opds.nama_bidang ASC"));


        return view('admin/view_tambah_opd', [
            "title" => "Tambah OPD",
            "parent" => "Daftar OPD",
            "child" => "Tambah OPD Baru",
            "root_parent" => "/admin/opd",
            "list_bidang" => $list_bidang
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_opd' => 'required|max:255',
            'bidang_opd' =>'required',
            'alamat_opd' => 'required',
            'no_telp' => 'required',
            'no_fax' => '',
            'lokasi_gps' => ''
        ]);
      
    
        DB::table('opds')->insert(array(
            'nama_opd' => $validateData['nama_opd'],
            'id_bidang' => $validateData['bidang_opd'],
            'alamat_opd' => $validateData['alamat_opd'],
            'no_telp' => $validateData['no_telp'],
            'no_fax' => $validateData['no_fax'],
            'lokasi_gps' => $validateData['lokasi_gps']
          ));
          
          return redirect('/admin/opd')->with('success', 'OPD baru berhasil ditambahkan !');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\opd  $opd
     * @return \Illuminate\Http\Response
     */
    public function show(opd $opd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\opd  $opd
     * @return \Illuminate\Http\Response
     */
    public function edit( $opd)
    {
 
        $list_bidang = DB::select(DB::raw("select * from bidang_opds order by bidang_opds.nama_bidang ASC"));
        
        $opd_selected = DB::select(DB::raw("select o.id  as id_opd, o.nama_opd , id_bidang , alamat_opd ,lokasi_gps,  no_telp , no_fax , bo.nama_bidang  
        from opds o
        join bidang_opds bo on bo.id =o.id_bidang 
        where o.id ='$opd'"));
        return ([
            'opd_selected' => $opd_selected,
            'list_bidang' => $list_bidang
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\opd  $opd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $opd)
    {

        $validateData = $request->validate([
            'edit_nama_opd' => 'required|max:255',
            'edit_bidang_opd' => 'required',
            'edit_alamat_opd' =>'required',
            'edit_telp_opd' => 'required',
            'edit_fax_opd' => 'required'

        ]);

        DB::table('opds')->where('id', $opd)
                            ->update(array(
            'nama_opd' => $validateData['edit_nama_opd'],
            'id_bidang' => $validateData['edit_bidang_opd'],
            'alamat_opd' => $validateData['edit_alamat_opd'],
            'no_telp' => $validateData['edit_telp_opd'],
            'no_fax' => $validateData['edit_fax_opd']
          ));


          return redirect('/admin/opd')->with('success', 'OPD berhasil diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\opd  $opd
     * @return \Illuminate\Http\Response
     */
    public function destroy($opd)
    {
        Opd::where('opds.id', '=', $opd)
        ->delete();

        return redirect('/admin/opd')->with('success', "OPD berhasil dihapus !");
    }
}
