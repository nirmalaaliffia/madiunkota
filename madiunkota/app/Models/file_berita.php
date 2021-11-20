<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file_berita extends Model
{
    use HasFactory;
    public $timestamps = false;

    
    protected $fillable = [
        'id', 'path_file', 'id_berita', 'nama_file'
    ];
}
