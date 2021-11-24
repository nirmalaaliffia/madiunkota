<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Berita;
use App\Models\Foto_berita;
use Illuminate\Http\Request;
use App\Models\Berita_kategori;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
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
        $berita= DB::select(DB::raw("select b.id as id_berita, u.name, b.judul , b.status_pinned, b.created_at , a.foto, a.path_foto, k.array_kategori,
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
          left join (
                      select fb.id_berita, fb.nama_foto as foto, fb.path_foto as path_foto
                   from foto_beritas fb 
                   join beritas b2 on b2.id = fb.id_berita
                   limit 1
          )as a  on b.id =a.id_berita
       join users u on u.id =b.id_pengirim order by b.created_at DESC "));

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
      $validateData = $request->validate([
          'judul_berita' => 'required|max:255',
          'kategori_berita' =>'required',
          'file_berita' => 'required',
          'deskripsi' => '',
          'pinned_berita' => 'required'

      ]);

      $validateData['user_id'] = auth()->user()->id;
      

      $id_berita = DB::table('beritas')->insertGetId(array(
        'judul' => $validateData['judul_berita'],
        'deskripsi' => $validateData['deskripsi'],
        'id_pengirim' => $validateData['user_id'],
        'status_publish' => '1',
        'created_at' => Carbon::now(),
        'status_pinned' => $validateData['pinned_berita']
      ));
   
      foreach($validateData['kategori_berita'] as $kategori){      

            $array[] = ['id_berita' => $id_berita, 'id_kategori' => $kategori ];
  
      }


      Berita_kategori::insert($array);



      if($request->hasFile('file_berita')){
        $file_beritas=$request->file('file_berita');

        foreach($file_beritas as $file_beritas){
            $nama_file = $file_beritas->getClientOriginalName();
            $fileName = pathinfo($nama_file, PATHINFO_FILENAME);
            $extension = $file_beritas->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $path = $file_beritas->storeAs('images', $fileName, 'public');

            Foto_berita::create([
                'nama_foto' => $fileName,
                'path_foto' => '/storage/'.$path,
                'id_berita' => $id_berita
            ]);
        }


    }

    return redirect('/admin/berita')->with('success', 'Berita berhasil ditambahkan !');
      
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show( $id_berita)
    {
        $berita=DB::select(DB::raw("select b.id as id_berita,b.status_pinned, u.name , b.judul ,b.deskripsi , b.created_at , a.foto, a.path_foto, k.array_kategori, k.list_id_kategori, b.status_publish
        from beritas b 
         join (
                    select bk.id_berita as id, array_to_string( array_agg(k.jenis_kategori ),', ') as array_kategori, array_agg(k.id) as list_id_kategori
                    from berita_kategoris bk 
                    join kategoris k on k.id =bk.id_kategori
                    group by bk.id_berita
                ) k using (id)
           left join (
                       select fb.id_berita, fb.nama_foto as foto, fb.path_foto as path_foto
                    from foto_beritas fb 
                    join beritas b2 on b2.id = fb.id_berita
                    limit 1
           )as a  on b.id =a.id_berita
        join users u on u.id =b.id_pengirim 
        where b.id = '$id_berita'"));
 
        $kategori_select = DB::select(DB::raw("select b.id , bk.id_kategori , k.jenis_kategori 
        from beritas b 
        join berita_kategoris bk on b.id =bk.id_berita 
        join kategoris k on k.id =bk.id_kategori 
        where b.id ='$id_berita'"));

        $file_berita = DB::select(DB::raw("select  fb.id ,  fb.id_berita ,fb.nama_foto ,fb.path_foto 
        from beritas b 
        join foto_beritas fb on fb.id_berita =b.id where b.id= '$id_berita' "));
       
        return ([
            'berita' => json_encode($berita),
            'kategori_select' => json_encode($kategori_select),
            'file_berita' => $file_berita
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit( $id_berita)
    {  
        $list_kategori = DB::select(DB::raw("select * from kategoris order by kategoris.id ASC"));

        $berita=DB::select(DB::raw("select b.id as id_berita, b.status_pinned,u.name , b.judul ,b.deskripsi , b.created_at , a.foto, a.path_foto, k.array_kategori, k.list_id_kategori, b.status_publish
       from beritas b 
        join (
                   select bk.id_berita as id, array_to_string( array_agg(k.jenis_kategori ),', ') as array_kategori, array_agg(k.id) as list_id_kategori
                   from berita_kategoris bk 
                   join kategoris k on k.id =bk.id_kategori
                   group by bk.id_berita
               ) k using (id)
          left join (
                      select fb.id_berita, fb.nama_foto as foto, fb.path_foto as path_foto
                   from foto_beritas fb 
                   join beritas b2 on b2.id = fb.id_berita
                   limit 1
          )as a  on b.id =a.id_berita
       join users u on u.id =b.id_pengirim 
       where b.id = '$id_berita'"));

       $kategori_select = DB::select(DB::raw("select b.id , bk.id_kategori , k.jenis_kategori 
       from beritas b 
       join berita_kategoris bk on b.id =bk.id_berita 
       join kategoris k on k.id =bk.id_kategori 
       where b.id ='$id_berita'"));

       $file_berita = DB::select(DB::raw("select  fb.id ,  fb.id_berita ,fb.nama_foto ,fb.path_foto 
       from beritas b 
       join foto_beritas fb on fb.id_berita =b.id where b.id= '$id_berita' "));

        return view('admin/edit_berita', [
            "title" => "Ubah Berita",
            "parent" => "Daftar Berita",
            "child" => "Ubah Berita",
            "root_parent" => "/admin/berita",
            "list_kategori" => $list_kategori,
            'id_berita' => $id_berita,
            'berita' => $berita,
            'kategori_select' => $kategori_select,
            'file_berita' => $file_berita
        ]);
     
   
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_berita)
    {
       
        $validateData = $request->validate([
            'id_berita' => 'required',
            'judul_berita' => 'required|max:255',
            'kategori' =>'required',
            'deskripsi' => '',
            'status_publish' => 'required',
            'pinned_berita' =>'required'
        ]);

        $validateData['user_id'] = auth()->user()->id;

        DB::table('beritas')->where('id', $id_berita)
                            ->update(array(
            'judul' => $validateData['judul_berita'],
            'deskripsi' => $validateData['deskripsi'],
            'id_pengirim' => $validateData['user_id'],
            'status_publish' => $validateData['status_publish'],
            'status_pinned' => $validateData['pinned_berita'],
            'updated_at' => Carbon::now()
          ));

     
       
        //$id_berita = $update_berita->id; // to get the id
    
   
      foreach($validateData['kategori'] as $kategori){      
        
            $array[] = ['id_berita' => $id_berita, 'id_kategori' => $kategori ];
           
  
      }

    

      DB::table('berita_kategoris')->where('id_berita', $id_berita)
                                    ->delete();

      Berita_kategori::insert($array);




      if($request->hasFile('file_berita')){
        $file_beritas=$request->file('file_berita');

        foreach($file_beritas as $file_beritas){
            $nama_file = $file_beritas->getClientOriginalName();
            $fileName = pathinfo($nama_file, PATHINFO_FILENAME);
            $extension = $file_beritas->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $path = $file_beritas->storeAs('images', $fileName, 'public');

            Foto_berita::updateOrCreate([
                'nama_foto' => $nama_file,
                'path_foto' => '/storage/'.$path,
                'id_berita' => $id_berita
            ]);
        }


    }

    return redirect('/admin/berita')->with('success', 'Berita berhasil ditambahkan !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id_file)
    {
       //
        $berita= Foto_berita::where('foto_beritas.id', '=', $id_file)->get();
         
       $id_berita = $berita['0']['id_berita'];

    //     return $berita;
        Foto_berita::where('foto_beritas.id', '=', $id_file)
         ->delete();

        


       
       return redirect('/admin/berita/'.$id_berita.'/edit');
       // return redirect('/admin/berita')->with('success', "File Berita berhasil dihapus !");
        
       
    }


    public function hapus_berita(Request $request){
        Berita_kategori::where('berita_kategoris.id_berita', '=', $request->id_berita)
        ->delete();
        
        Foto_berita::where('foto_beritas.id_berita', '=', $request->id_berita)
        ->delete();

        Berita::where('beritas.id', '=', $request->id_berita)
        ->delete();

        return redirect('/admin/berita')->with('success', "Berita berhasil dihapus !");
    }
    
}
