<?php

namespace App\Http\Controllers;

use App\Models\bidang_opd;
use Illuminate\Http\Request;

class BidangOpdController extends Controller
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
        //
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
     * @param  \App\Models\bidang_opd  $bidang_opd
     * @return \Illuminate\Http\Response
     */
    public function show(bidang_opd $bidang_opd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bidang_opd  $bidang_opd
     * @return \Illuminate\Http\Response
     */
    public function edit(bidang_opd $bidang_opd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bidang_opd  $bidang_opd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bidang_opd $bidang_opd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bidang_opd  $bidang_opd
     * @return \Illuminate\Http\Response
     */
    public function destroy(bidang_opd $bidang_opd)
    {
        //
    }
}
