<?php

namespace App\Http\Controllers;


use App\Models\Ipkd;
use App\Models\Berita;
use GuzzleHttp\Client;
use App\Models\Kategori;
use App\Models\Foto_berita;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Client\Response;
use Illuminate\Pagination\Paginator;
use GuzzleHttp\Exception\RequestException;
use Symfony\Component\Console\Input\Input;
use Illuminate\Pagination\LengthAwarePaginator;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $berita= DB::select(DB::raw("select b.id as id_berita,  b.judul , b.created_at ,k.array_kategori, u.name, a.foto, a.path_foto
        // from beritas b 
        // left join(
        //     select fb.id_berita, fb.nama_foto as foto, fb.path_foto as path_foto
        //     from foto_beritas fb 
        //     join beritas b2 on b2.id = fb.id_berita
        //     limit 1
        //    ) as a 
        //    on b.id =a.id_berita
        // join (
        //     select bk.id_berita as id, array_to_string( array_agg(k.jenis_kategori ),', ') as array_kategori
        //     from berita_kategoris bk 
        //     join kategoris k on k.id =bk.id_kategori
        //     group by bk.id_berita
        // ) k using (id)
        // join users u on b.id=u.id "));

        
        $berita_pinned= DB::select(DB::raw("select b.id as id_berita, b.deskripsi,u.name , b.judul , b.created_at , a.foto, a.path_foto, k.array_kategori
        from beritas b 
         join ( select bk.id_berita as id, array_to_string( array_agg(k.jenis_kategori ),', ') as array_kategori
                    from berita_kategoris bk 
                    join kategoris k on k.id =bk.id_kategori
                    group by bk.id_berita
                ) k using (id)
           left join (
            select distinct on (fb.id_berita ) fb.id_berita ,fb.nama_foto as foto, fb.path_foto as path_foto
            from foto_beritas fb 
            join beritas b2 on b2.id = fb.id_berita
            where fb.nama_foto similar to '%(.jpg|.png|.jpeg)%'
           )as a  on b.id =a.id_berita
        join users u on u.id =b.id_pengirim
        where b.status_publish =1 and b.status_pinned=1
        order by b.created_at DESC"));


        $berita= DB::select(DB::raw("select b.id as id_berita,b.deskripsi, u.name , b.judul , b.created_at , a.foto, a.path_foto, k.array_kategori, a.status_path
        from beritas b 
         join ( select bk.id_berita as id, array_to_string( array_agg(k.jenis_kategori ),', ') as array_kategori
                    from berita_kategoris bk 
                    join kategoris k on k.id =bk.id_kategori
                    group by bk.id_berita
                ) k using (id)
           left join (
            select distinct on (fb.id_berita ) fb.id_berita ,fb.nama_foto as foto, fb.path_foto as path_foto,
            case when fb.nama_foto ~* '(.jpg|.png|.jpeg)' then 'link_madiunkota'
        		when fb.path_foto  ~* '(.jpg|.png|.jpeg)' then 'link_portal' 
        		else 'null'
        		end as status_path
            from foto_beritas fb 
            join beritas b2 on b2.id = fb.id_berita
           )as a  on b.id =a.id_berita
        join users u on u.id =b.id_pengirim
        where b.status_publish =1 and b.status_pinned=0
        order by b.created_at DESC
        limit 8"));

        


        $tabloid=DB::select(DB::raw("select b.id as id_berita, b.deskripsi,u.name , b.judul , b.created_at , a.foto, a.path_foto, k.array_kategori
        from beritas b 
         join ( select bk.id_berita as id, array_to_string( array_agg(k.jenis_kategori ),', ') as array_kategori
                    from berita_kategoris bk 
                    join kategoris k on k.id =bk.id_kategori
                    where k.id =2
                    group by bk.id_berita
                ) k using (id)
           left join (
            select distinct on (fb.id_berita ) fb.id_berita ,fb.nama_foto as foto, fb.path_foto as path_foto
            from foto_beritas fb 
            join beritas b2 on b2.id = fb.id_berita
            where fb.nama_foto similar to '%(.jpg|.png|.jpeg)%'
           )as a  on b.id =a.id_berita
        join users u on u.id =b.id_pengirim
        where b.status_publish =1 
        order by b.created_at desc"));


        $client = new Client();

        $link = 'http://10.11.15.69:680/api/ruangrapat/jadwal';

        try{
            $response = $client->post($link, 
                array(
                    'headers' => array(
                        'passcode' => 'k0taPendekArr'
                    )
                )
            );
        }catch(RequestException $e){
            var_dump($e->getResponse()->getBody()->getContents());
        }
        
        $json = $response->getBody()->getContents();
        
        $array_result = json_decode($json, true);
        // print_r($array_result);

        // echo $array_result["data"]["0"]["visi"];
        
        // echo "Jumlah Array : ".(count($array_result)-1);

        // DB::table('visi_eplannings')->delete();

        // for ($i=0; $i < 3; $i++) { 
        //     // Visi_eplanning::create([
        //     //     'id_tahunrpjm' => $array_result["data"]["$i"]["id_tahunrpjm"],
        //     //     'tahunAwal' => $array_result["data"]["$i"]["tahunAwal"],
        //     //     'tahunAkhir' => $array_result["data"]["$i"]["tahunAkhir"],
        //     //     'visi' => $array_result["data"]["$i"]["visi"],
        //     // ]);
        //   $data = arra([
        //     $array_result["data"]["$i"]["judul_rapat"],

        //   ]);
           
        // }
    

        return view('home',[
            "title" => "Home",
           "parent" => "Home",
           "berita" => $berita,
           "tabloid" => $tabloid,
           "berita_pinned" => $berita_pinned,
           "agenda" => $array_result
        ]);
    }

    public function show_berita(Request $request){

        
        // $berita= DB::select(DB::raw("select b.id as id_berita,b.deskripsi, u.name , b.judul , b.created_at , a.foto, a.path_foto, k.array_kategori
        // from beritas b 
        //  join ( select bk.id_berita as id, array_to_string( array_agg(k.jenis_kategori ),', ') as array_kategori
        //             from berita_kategoris bk 
        //             join kategoris k on k.id =bk.id_kategori
        //             group by bk.id_berita
        //         ) k using (id)
        //    left join (
        //     select distinct on (fb.id_berita ) fb.id_berita ,fb.nama_foto as foto, fb.path_foto as path_foto
        //     from foto_beritas fb 
        //     join beritas b2 on b2.id = fb.id_berita
        //     where fb.nama_foto similar to '%(.jpg|.png|.jpeg)%'
        //    )as a  on b.id =a.id_berita
        // join users u on u.id =b.id_pengirim
        // order by b.created_at DESC"));

        $berita = DB::table('berita_all')->paginate(15);
    
        return view('berita/berita',[
            "title" => "Berita",
           "parent" => "Home",
           "berita" => $berita
          
        ]);
    }

 


    public function show_detail_berita($id){

        $berita=DB::select(DB::raw("select b.id as id_berita,b.deskripsi, u.name , b.judul , b.deskripsi , b.created_at , a.foto, a.path_foto, k.array_kategori,
	    case when b.deskripsi ~* '.*pdf-embedder*.' then 'link_pdf'
        else null end as deskripsi_pdf
        from beritas b 
         join ( select bk.id_berita as id, array_to_string( array_agg(k.jenis_kategori ),', ') as array_kategori
                    from berita_kategoris bk 
                    join kategoris k on k.id =bk.id_kategori
                    group by bk.id_berita
                ) k using (id)
           left join (
                       select distinct on (fb.id_berita ) fb.id_berita, fb.nama_foto as foto, fb.path_foto as path_foto
                    from foto_beritas fb 
                    join beritas b2 on b2.id = fb.id_berita
                    where fb.nama_foto ~ '\.(jpg|jpeg|png|pdf)$'
           )as a  on b.id =a.id_berita
        join users u on u.id =b.id_pengirim
        where b.id =$id"));


       
        $data_file = DB::select(DB::raw(" select *
        from foto_beritas fb 
    	where fb.id_berita = $id and fb.path_foto ~ '\.(pdf|PDF)$'"));

        $data_foto = DB::select(DB::raw(" select *
        from foto_beritas fb 
    	where fb.id_berita = $id and fb.path_foto ~ '\.(jpg|png|jpeg|JPG|PNG|JPEG)$'"));
        
        // $berita = Berita::where('id', '=', $id)->get();
        return view('berita/detail_berita',[
            "title" => "Detail Berita",
            "parent" => "berita",
            "berita" => $berita,
            "child" => "",
            "root_parent" => "/",
            "data_file" => $data_file,
            "data_foto" => $data_foto
            
        ]);
    }

    public function download_file($id){

        $data_file = Foto_berita::where('id', '=', $id)->get();

        foreach($data_file as $data_file){
            $nama_file = $data_file->nama_foto;
            $fileName = $nama_file.'_'.time().'.pdf';

            $filePath = public_path($data_file->path_foto);
        }
   
      
    	$headers = ['Content-Type: application/pdf'];
    	// $fileName = time().'.pdf';

    	return response()->download($filePath, $fileName, $headers);
    }


    public function show_jadwal(){
        $client = new Client();

        $link = 'http://10.11.15.69:680/api/ruangrapat/jadwal';

        try{
            $response = $client->post($link, 
                array(
                    'headers' => array(
                        'passcode' => 'k0taPendekArr'
                    )
                )
            );
        }catch(RequestException $e){
            var_dump($e->getResponse()->getBody()->getContents());
        }
        
        $json = $response->getBody()->getContents();
        
        $array_result = json_decode($json, true);
        // print_r($array_result);

        // echo $array_result["data"]["0"]["visi"];
        
        // echo "Jumlah Array : ".(count($array_result)-1);

        // DB::table('visi_eplannings')->delete();

        // for ($i=0; $i < 3; $i++) { 
        //     // Visi_eplanning::create([
        //     //     'id_tahunrpjm' => $array_result["data"]["$i"]["id_tahunrpjm"],
        //     //     'tahunAwal' => $array_result["data"]["$i"]["tahunAwal"],
        //     //     'tahunAkhir' => $array_result["data"]["$i"]["tahunAkhir"],
        //     //     'visi' => $array_result["data"]["$i"]["visi"],
        //     // ]);
        //   $data[]= $array_result["data"]["$i"]["id"];
           
        // }

        // session()->put('statusY', 'Data visi berhasil diupdate dari eplanning!' );
        $jumlah = (count($array_result["data"]));
      
       //return $array_result["data"]["0"]["judul_rapat"];
        return view('jadwal', [
            "data_rapat" => $array_result,
            "jumlah" => $jumlah,
            "title" => "Jadwal",
            "parent" => "jadwal_rapat"
        ]);
    }


    public function show_informasi(){

        $berita=DB::select(DB::raw(" select b.id as id_berita,b.deskripsi, u.name , b.judul , b.created_at , a.foto, a.path_foto, k.array_kategori
        from beritas b 
         join ( select bk.id_berita as id, array_to_string( array_agg(k.jenis_kategori ),', ') as array_kategori
                    from berita_kategoris bk 
                    join kategoris k on k.id =bk.id_kategori
                    where k.id =1
                    group by bk.id_berita
                ) k using (id)
           left join (
            select distinct on (fb.id_berita ) fb.id_berita ,fb.nama_foto as foto, fb.path_foto as path_foto
            from foto_beritas fb 
            join beritas b2 on b2.id = fb.id_berita
            where fb.nama_foto similar to '%(.jpg|.png|.jpeg)%'
           )as a  on b.id =a.id_berita
        join users u on u.id =b.id_pengirim
        where b.status_publish =1 
        order by b.created_at desc"));


        return view('berita/informasi', [
            "title" => "Informasi",
            "parent" => "berita",
            "berita" => $berita
        ]);
    }


    public function show_kegiatan_pemkot(){

        $berita=DB::select(DB::raw(" select b.id as id_berita, b.deskripsi,u.name , b.judul , b.created_at , a.foto, a.path_foto, k.array_kategori
        from beritas b 
         join ( select bk.id_berita as id, array_to_string( array_agg(k.jenis_kategori ),', ') as array_kategori
                    from berita_kategoris bk 
                    join kategoris k on k.id =bk.id_kategori
                    where k.id =8
                    group by bk.id_berita
                ) k using (id)
           left join (
            select distinct on (fb.id_berita ) fb.id_berita ,fb.nama_foto as foto, fb.path_foto as path_foto
            from foto_beritas fb 
            join beritas b2 on b2.id = fb.id_berita
            where fb.nama_foto similar to '%(.jpg|.png|.jpeg)%'
           )as a  on b.id =a.id_berita
        join users u on u.id =b.id_pengirim
        where b.status_publish =1 
        order by b.created_at desc"));

         return view('berita/kegiatan_pemkot', [
            "title" => "Kegiatan Pemkot",
            "parent" => "berita",
            "berita" => $berita
        ]);

    }

    public function show_pengumuman(){

        $berita=DB::select(DB::raw(" select b.id as id_berita, b.deskripsi,u.name , b.judul , b.created_at , a.foto, a.path_foto, k.array_kategori
        from beritas b 
         join ( select bk.id_berita as id, array_to_string( array_agg(k.jenis_kategori ),', ') as array_kategori
                    from berita_kategoris bk 
                    join kategoris k on k.id =bk.id_kategori
                    where k.id =3
                    group by bk.id_berita
                ) k using (id)
           left join (
            select distinct on (fb.id_berita ) fb.id_berita ,fb.nama_foto as foto, fb.path_foto as path_foto
            from foto_beritas fb 
            join beritas b2 on b2.id = fb.id_berita
            where fb.nama_foto similar to '%(.jpg|.png|.jpeg)%'
           )as a  on b.id =a.id_berita
        join users u on u.id =b.id_pengirim
        where b.status_publish =1 
        order by b.created_at desc"));

      
        return view('berita/pengumuman', [
            "title" => "Pengumuman",
            "parent" => "berita",
            "berita" => $berita
        ]);

    }

    public function show_lowongan(){

        $berita=DB::select(DB::raw(" select b.id as id_berita, b.deskripsi,u.name , b.judul , b.created_at , a.foto, a.path_foto, k.array_kategori
        from beritas b 
         join ( select bk.id_berita as id, array_to_string( array_agg(k.jenis_kategori ),', ') as array_kategori
                    from berita_kategoris bk 
                    join kategoris k on k.id =bk.id_kategori
                    where k.id =4
                    group by bk.id_berita
                ) k using (id)
           left join (
            select distinct on (fb.id_berita ) fb.id_berita ,fb.nama_foto as foto, fb.path_foto as path_foto
            from foto_beritas fb 
            join beritas b2 on b2.id = fb.id_berita
            where fb.nama_foto similar to '%(.jpg|.png|.jpeg)%'
           )as a  on b.id =a.id_berita
        join users u on u.id =b.id_pengirim
        where b.status_publish =1 
        order by b.created_at desc"));

      
        return view('berita/lowongan', [
            "title" => "Lowongan",
            "parent" => "berita",
            "berita" => $berita
        ]);

    }

    public function show_kegiatan_walikota(){

        $berita=DB::select(DB::raw(" select b.id as id_berita,b.deskripsi, u.name , b.judul , b.created_at , a.foto, a.path_foto, k.array_kategori
        from beritas b 
         join ( select bk.id_berita as id, array_to_string( array_agg(k.jenis_kategori ),', ') as array_kategori
                    from berita_kategoris bk 
                    join kategoris k on k.id =bk.id_kategori
                    where k.id =9
                    group by bk.id_berita
                ) k using (id)
           left join (
            select distinct on (fb.id_berita ) fb.id_berita ,fb.nama_foto as foto, fb.path_foto as path_foto
            from foto_beritas fb 
            join beritas b2 on b2.id = fb.id_berita
            where fb.nama_foto similar to '%(.jpg|.png|.jpeg)%'
           )as a  on b.id =a.id_berita
        join users u on u.id =b.id_pengirim
        where b.status_publish =1 
        order by b.created_at desc"));

      
        return view('arsip/kegiatan_walikota', [
            "title" => "Kegiatan Walikota",
            "parent" => "arsip",
            "berita" => $berita
        ]);

    }

    public function show_tabloid(){

        $berita=DB::select(DB::raw(" select b.id as id_berita,b.deskripsi, u.name , b.judul , b.created_at , a.foto, a.path_foto, k.array_kategori
        from beritas b 
         join ( select bk.id_berita as id, array_to_string( array_agg(k.jenis_kategori ),', ') as array_kategori
                    from berita_kategoris bk 
                    join kategoris k on k.id =bk.id_kategori
                    where k.id =2
                    group by bk.id_berita
                ) k using (id)
           left join (
            select distinct on (fb.id_berita ) fb.id_berita ,fb.nama_foto as foto, fb.path_foto as path_foto
            from foto_beritas fb 
            join beritas b2 on b2.id = fb.id_berita
            where fb.nama_foto similar to '%(.jpg|.png|.jpeg)%'
           )as a  on b.id =a.id_berita
        join users u on u.id =b.id_pengirim
        where b.status_publish =1 
        order by b.created_at desc"));

      
        

        return view('arsip/tabloid', [
            "title" => "Tabloid",
            "parent" => "arsip",
            "berita" => $berita
        ]);

    }


    public function show_dokumen(){

        $berita=DB::select(DB::raw(" select b.id as id_berita,b.deskripsi, u.name , b.judul , b.created_at , a.foto, a.path_foto, k.array_kategori
        from beritas b 
         join ( select bk.id_berita as id, array_to_string( array_agg(k.jenis_kategori ),', ') as array_kategori
                    from berita_kategoris bk 
                    join kategoris k on k.id =bk.id_kategori
                    where k.id =6
                    group by bk.id_berita
                ) k using (id)
           left join (
            select distinct on (fb.id_berita ) fb.id_berita ,fb.nama_foto as foto, fb.path_foto as path_foto
            from foto_beritas fb 
            join beritas b2 on b2.id = fb.id_berita
            where fb.nama_foto similar to '%(.jpg|.png|.jpeg)%'
           )as a  on b.id =a.id_berita
        join users u on u.id =b.id_pengirim
        where b.status_publish =1 
        order by b.created_at desc"));

      
         return view('arsip/dokumen', [
            "title" => "Dokumen",
            "parent" => "arsip",
            "berita" => $berita
        ]);
    }

    public function show_foto(){

        $berita=DB::select(DB::raw(" select b.id as id_berita,b.deskripsi, u.name , b.judul , b.created_at , a.foto, a.path_foto, k.array_kategori
        from beritas b 
         join ( select bk.id_berita as id, array_to_string( array_agg(k.jenis_kategori ),', ') as array_kategori
                    from berita_kategoris bk 
                    join kategoris k on k.id =bk.id_kategori
                    where k.id =11
                    group by bk.id_berita
                ) k using (id)
           left join (
            select distinct on (fb.id_berita ) fb.id_berita ,fb.nama_foto as foto, fb.path_foto as path_foto
            from foto_beritas fb 
            join beritas b2 on b2.id = fb.id_berita
            where fb.nama_foto similar to '%(.jpg|.png|.jpeg)%'
           )as a  on b.id =a.id_berita
        join users u on u.id =b.id_pengirim
        where b.status_publish =1 
        order by b.created_at desc"));

 
        return view('arsip/foto', [
            "title" => "Foto",
            "parent" => "arsip",
            "berita" => $berita
        ]);
    }

    public function show_video(){

        $berita=DB::select(DB::raw(" select b.id as id_berita, b.deskripsi, u.name , b.judul , b.created_at , a.foto, a.path_foto, k.array_kategori
        from beritas b 
         join ( select bk.id_berita as id, array_to_string( array_agg(k.jenis_kategori ),', ') as array_kategori
                    from berita_kategoris bk 
                    join kategoris k on k.id =bk.id_kategori
                    where k.id =12
                    group by bk.id_berita
                ) k using (id)
           left join (
            select distinct on (fb.id_berita ) fb.id_berita ,fb.nama_foto as foto, fb.path_foto as path_foto
            from foto_beritas fb 
            join beritas b2 on b2.id = fb.id_berita
            where fb.nama_foto similar to '%(.jpg|.png|.jpeg)%'
           )as a  on b.id =a.id_berita
        join users u on u.id =b.id_pengirim
        where b.status_publish =1 
        order by b.created_at desc"));

 
        return view('arsip/video', [
            "title" => "Video",
            "parent" => "arsip",
            "berita" => $berita
        ]);
    }


    public function show_ipkd(){

        $berita=DB::select(DB::raw(" select * from ipkds i "));

 
        return view('arsip/ipkd', [
            "title" => "IPKD",
            "parent" => "arsip",
            "berita" => $berita
        ]);
    }

    public function download_ipkd($id){

        $data_file = Ipkd::where('id', '=', $id)->get();

        foreach($data_file as $data_file){
            $nama = $data_file->nama_file;
            $fileName = $nama.'_'.time().'.pdf';

            $filePath = public_path($data_file->path_file);
        }
   
      
    	$headers = ['Content-Type: application/pdf'];
    	// $fileName = time().'.pdf';

    	return response()->download($filePath, $fileName, $headers);
    }


    public function show_sejarah(){

        $profil=DB::select(DB::raw("select * from profils p where p.id= 1"));

        return view('profil/sejarah', [
            "title" => "Sejarah",
            "parent" => "profil",
            "profil" => $profil
        ]);
    }


    public function show_profil_pimpinan(){

        $profil=DB::select(DB::raw("select * from profils p where p.id= 3"));

        return view('profil/profil_pimpinan', [
            "title" => "Profil Pimpinan",
            "parent" => "profil",
            "profil" => $profil
        ]);
    }
    
    public function show_visi_misi(){

        $profil=DB::select(DB::raw("select * from profils p where p.id= 2"));

        return view('profil/visi_misi', [
            "title" => "Visi Misi",
            "parent" => "profil",
            "profil" => $profil
        ]);
    }


    public function show_wilayah(){

        $profil=DB::select(DB::raw("select * from profils p where p.id= 4"));

        return view('profil/wilayah_geografis', [
            "title" => "Wilayah Geografis",
            "parent" => "profil",
            "profil" => $profil
        ]);
    }


    public function show_alamat(){

        $profil=DB::select(DB::raw("select * from opds o order by o.nama_opd ASC"));

        return view('profil/alamat_opd', [
            "title" => "Alamat OPD",
            "parent" => "profil",
            "profil" => $profil
        ]);
    }


    public function show_data_penduduk_2019(){

        $stats_foto=DB::select(DB::raw(" select b.id as id_berita, b.deskripsi, u.name , b.judul , b.created_at , a.foto, a.path_foto, k.array_kategori
        from beritas b 
         join ( select bk.id_berita as id, array_to_string( array_agg(k.jenis_kategori ),', ') as array_kategori
                    from berita_kategoris bk 
                    join kategoris k on k.id =bk.id_kategori
                    where k.id =10
                    group by bk.id_berita
                ) k using (id)
           left join (
            select distinct on (fb.id_berita ) fb.id_berita ,fb.nama_foto as foto, fb.path_foto as path_foto
            from foto_beritas fb 
            join beritas b2 on b2.id = fb.id_berita
            where fb.nama_foto similar to '%(.jpg|.png|.jpeg)%'
           )as a  on b.id =a.id_berita
        join users u on u.id =b.id_pengirim
        where b.status_publish =1 
        order by b.created_at desc"));

        $stats_file=DB::select(DB::raw(" select b.id as id_berita, b.deskripsi, u.name , b.judul , b.created_at , a.foto, a.path_foto, k.array_kategori
        from beritas b 
         join ( select bk.id_berita as id, array_to_string( array_agg(k.jenis_kategori ),', ') as array_kategori
                    from berita_kategoris bk 
                    join kategoris k on k.id =bk.id_kategori
                    where k.id =10
                    group by bk.id_berita
                ) k using (id)
           left join (
            select distinct on (fb.id_berita ) fb.id_berita ,fb.nama_foto as foto, fb.path_foto as path_foto
            from foto_beritas fb 
            join beritas b2 on b2.id = fb.id_berita
            where fb.nama_foto similar to '%(.pdf)%'
           )as a  on b.id =a.id_berita
        join users u on u.id =b.id_pengirim
        where b.status_publish =1 
        order by b.created_at desc"));

  
        return view('statistik/data_penduduk_2019', [
            "title" => "Data Statistik",
            "parent" => "statistik",
            "stats" => $stats_foto,
            "stats_file" => $stats_file
        ]);
    }


    public function filter_berita(Request $request){
        return $request;
    }

   
}
