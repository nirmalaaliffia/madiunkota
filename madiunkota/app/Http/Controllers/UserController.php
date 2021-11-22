<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\opd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;

class UserController extends Controller
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
        
        $user= DB::select(DB::raw("select * from users order by name"));


        
       
        return view('admin/daftar_user', [
            "title" => "Daftar User",
            "parent" => "user",
            "child" => "",
            "root_parent" => "/admin",
            "user" => $user
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
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'required_with:konfirmasi_password', 'same:konfirmasi_password'],
            'konfirmasi_password' => ['required', 'string', 'min:8']
        ]);
      
    
        DB::table('users')->insert(array(
            'name' => $validateData['nama_lengkap'],
            'email' => $validateData['email'],
            'password' => Hash::make($validateData['password']),
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now()
          ));
          
          return redirect('/admin/user')->with('success', 'User baru berhasil ditambahkan !');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\opd  $opd
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\opd  $opd
     * @return \Illuminate\Http\Response
     */
    public function edit( $user)
    {
        $user_selected = DB::select(DB::raw("select * 
        from users u
        where u.id ='$user'"));
        return ([
            'user_selected' => $user_selected
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\opd  $opd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {

      

        if( $request->input('password_baru') != null OR $request->input('konfirmasi_password_baru') != null ){
            $validateData = $request->validate([
                'edit_id' => 'required',
                'edit_nama' => ['required', 'string', 'max:255'],
                'edit_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user],
                'password_baru' => [ 'required', 'string', 'min:8', 'required_with:konfirmasi_password_baru', 'same:konfirmasi_password_baru'],
                'konfirmasi_password_baru' => [ 'required','string', 'min:8']
               
            ]);

            DB::table('users')->where('id', $user)
            ->update(array(
            'name' => $validateData['edit_nama'],
            'email' => $validateData['edit_email'],
            'updated_at' =>  Carbon::now(),
            'password' => Hash::make($validateData['password_baru'])
             ));

             return redirect('/admin/user')->with('success', 'USER berhasil diupdate !');
            
        }else{
            $validateData = $request->validate([
                'edit_id' => 'required',
                'edit_nama' => ['required', 'string', 'max:255'],
                'edit_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user],
         
            ]);

            DB::table('users')->where('id', $user)
            ->update(array(
            'name' => $validateData['edit_nama'],
            'email' => $validateData['edit_email'],
            'updated_at' =>  Carbon::now(),
             ));

             return redirect('/admin/user')->with('success', 'USER berhasil diupdate !');
        }

   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\opd  $opd
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        User::where('users.id', '=', $user)
        ->delete();

        return redirect('/admin/user')->with('success', "User berhasil dihapus !");
    }
}
