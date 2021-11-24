<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bidang_opd extends Model
{
    use HasFactory;
    public $timestamps = false;


    // protected $primaryKey= null;
    // public $increment = false;

    protected $fillable = [
        'id', 'nama_bidang'
    ];
}
