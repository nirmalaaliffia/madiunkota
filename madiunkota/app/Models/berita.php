<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'judul', 'deskripsi', 'id_pengirim', 'status_publish', 'created_at', 'updated_at'
    ];

}


// class Berita{
//     private static $berita = [[
//         "judul" => " Berita Baru",
//         "slug" => "berita-baru",
//         "Deskripsi" => "dnajksdbsaj dashbd hasb dh shbd hasbdh asdb"
//     ],
//     [
//         "judul" => " Berita Baru Dua",
//         "slug" => "berita-baru-dua",
//         "Deskripsi" => "duam as najksdbsaj dashbd hasb dh shbd hasbdh asdb"
//     ]
//     ];

//     public static function all(){
//         return collect(self::$berita);
       
//     }

//     public static function find($slug){
//         $beritas = static::all();
//         // $berita = [];
//         // foreach($beritas as $b){
//         //     if($b["slug"] === $slug){
//         //         $berita = $b;
//         //     }
//         // }
//         // return $berita;

//         return $beritas->firstWhere('slug', $slug);
//     }
// }
