<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BeritaKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Berita_kategori::create([
            'id_berita' => '1', 'id_kategori' => "1"
        ]);
        \App\Models\Berita_kategori::create([
            'id_berita' => '2', 'id_kategori' => "1"
        ]);
        \App\Models\Berita_kategori::create([
            'id_berita' => '2', 'id_kategori' => "2"
        ]);
    }
}
