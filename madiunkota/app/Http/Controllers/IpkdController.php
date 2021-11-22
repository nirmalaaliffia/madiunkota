<?php

namespace App\Http\Controllers;

use App\Models\ipkd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class IpkdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ipkd= DB::select(DB::raw(" select i.id as id_ipkd, i.nama_file ,i.path_file from ipkds i order by i.id DESC "));

       
        return view('admin/daftar_ipkd', [
            "title" => "Daftar IPKD",
            "parent" => "ipkd",
            "child" => "",
            "root_parent" => "/admin",
            "ipkd" => $ipkd
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
        $validateData = $request->validate([
            'nama_ipkd' => 'required|max:255',
            // 'file_ipkd' =>'required'
        ]);


          if($request->hasFile('file_ipkd')){
            $file_ipkd=$request->file('file_ipkd');
    
            foreach($file_ipkd as $ipkd){
                $nama_file = $ipkd->getClientOriginalName();
                $fileName = pathinfo($nama_file, PATHINFO_FILENAME);
                $extension = $ipkd->getClientOriginalExtension();
                $fileName = $fileName.'_'.time().'.'.$extension;
    
                $path = $ipkd->storeAs('files', $fileName, 'public');

                
    
              
                DB::table('ipkds')->insert(array(
                    'nama_file' => $validateData['nama_ipkd'],
                    'path_file' => '/storage/'.$path
                  ));
            }
          
    
        }
         
         return redirect('/admin/ipkd')->with('success', 'IPKD baru berhasil ditambahkan !');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ipkd  $ipkd
     * @return \Illuminate\Http\Response
     */
    public function show(ipkd $ipkd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ipkd  $ipkd
     * @return \Illuminate\Http\Response
     */
    public function edit(ipkd $ipkd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ipkd  $ipkd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ipkd $ipkd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ipkd  $ipkd
     * @return \Illuminate\Http\Response
     */
    public function destroy(ipkd $ipkd)
    {
        Ipkd::where('ipkds.id', '=', $ipkd->id)
        ->delete();

        return redirect('/admin/ipkd')->with('success', "IPKD berhasil dihapus !");
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
}
