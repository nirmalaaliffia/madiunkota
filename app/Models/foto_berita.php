<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foto_berita extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id', 'path_foto', 'id_berita', 'nama_foto', 'status_thumbnail'
    ];
}
