<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\kategori;
use App\Models\file_berita;
use App\Models\foto_berita;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

// use App\Models\Berita;

class BeritaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('admin/dashboard',[
            "title" => "Dashboard",
            "parent" => "dashboard",
           "child" => "",
           "root_parent" => "/admin",
            
        ]);
    }

    //SISI LANDING PAGE
    public function show_detail_berita($id){

        $berita = Berita::select('beritas.*', 'users.name')
                        ->join('users','users.id', '=', 'beritas.id_pengirim')
                        ->where('beritas.id', '=', $id)
                        ->get();

        // $berita = Berita::where('id', '=', $id)->get();
        return view('berita/detail_berita',[
            "title" => "Detail Berita",
            "parent" => "berita",
            "berita" => $berita,
            "child" => "",
            "root_parent" => "/",
            
        ]);
    }

    //SISI ADMIN
    public function lihat_berita(){
        $berita= DB::select(DB::raw("select b.id as id_berita,  b.judul , b.deskripsi  , b.created_at ,k.array_kategori, u.name , 
        case 
        when (b.status_publish = '1') then 'Terlihat' 
        when (b.status_publish = '0' ) then 'Disembunyikan' end as status_publish  
        from beritas b 
        join (
            select bk.id_berita as id, array_to_string( array_agg(k.jenis_kategori ),', ') as array_kategori
            from berita_kategoris bk 
            join kategoris k on k.id =bk.id_kategori
            group by bk.id_berita
        ) k using (id)
        join users u on b.id=u.id "));

        $list_kategori = DB::select(DB::raw("select * from kategoris order by kategoris.id ASC"));

        

        return view('admin/daftar_berita', [
            "title" => "Daftar Berita",
            "parent" => "berita",
            "berita" => $berita,
            "list_kategori" => $list_kategori,
            "child" => "",
            "root_parent" => "/admin",
            
        ]);
    }

    public function lihat_opd(){
        return view('admin/daftar_opd', [
            "title" => "Daftar OPD",
            "parent" => "opd",
            "child" => "",
            "root_parent" => "/admin",
        ]);
    }

    public function lihat_profil(){
        return view('admin/daftar_profil', [
            "title" => "Profil Kota",
            "parent" => "Profil",
            "root_parent" => "/admin",
            "child" => ""
        ]);
    }

    public function view_tambah_berita(){

        $list_kategori = DB::select(DB::raw("select * from kategoris order by kategoris.id ASC"));


        return view('admin/view_tambah_berita', [
            "title" => "Tambah Berita",
            "parent" => "Daftar Berita",
            "child" => "Tambah Berita Baru",
            "root_parent" => "/admin/berita",
            "list_kategori" => $list_kategori
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
        $request->validate([
            'file_berita' => 'required',
            ''
            
        ]);

        if($request->hasFile('file_berita')){
            $file_beritas=$request->file('file_berita');

            foreach($file_beritas as $file_beritas){
                $nama_file = $file_beritas->getClientOriginalName();
                $fileName = pathinfo($nama_file, PATHINFO_FILENAME);
                $extension = $file_beritas->getClientOriginalExtension();
                $fileName = $fileName.'_'.time().'.'.$extension;

                $path = $file_beritas->storeAs('images', $fileName, 'public');

                Foto_berita::create([
                    'nama_foto' => $nama_file,
                    'path_foto' => '/storage/'.$path,
                    'id_berita' => '1'
                ]);
            }

        }

        // if($request->hasFile('upload')) {
        //             $originName = $request->file('upload')->getClientOriginalName();
        //             $fileName = pathinfo($originName, PATHINFO_FILENAME);
        //             $extension = $request->file('upload')->getClientOriginalExtension();
        //             $fileName = $fileName.'_'.time().'.'.$extension;
                
        //             $request->file('upload')->move(public_path('images'), $fileName);
           
        //             $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        //             $url = asset('images/'.$fileName); 
        //             $msg = 'Image uploaded successfully'; 
        //             $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
                       
        //             @header('Content-type: text/html; charset=utf-8'); 
        //             echo $response;
        //         }
        
        return back()->with('success', 'Image teruplaods');
    }

    
}
