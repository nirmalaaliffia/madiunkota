<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class opd extends Model
{
    use HasFactory;

    public $timestamps = false;


    // protected $primaryKey= null;
    // public $increment = false;

    protected $fillable = [
        'id', 'nama_opd', 'id_bidang', 'alamat_opd', 'no_telp', 'no_fax'
    ];
    

  
}
