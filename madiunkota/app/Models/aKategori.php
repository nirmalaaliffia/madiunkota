<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
     use HasFactory;

    // const CREATED_AT = null;
    // const UPDATED_AT =null;
    // public $timestamp = false;
    public $timestamps = false;

    protected $fillable = [
        'id', 'jenis_kategori', 'warna_label', 'status_aktif', 
    ];

    
    //  protected $guarded = [];

    // // public function kategoris(){
    //     return $this->morphToMany(kategoris::class, 'index');
    // }
}
