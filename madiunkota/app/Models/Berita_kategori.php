<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita_kategori extends Model
{
    use HasFactory;

    public $timestamps = false;
  
    protected $fillable = [
        'id', 'id_berita', 'id_kategori'
    ];
}
