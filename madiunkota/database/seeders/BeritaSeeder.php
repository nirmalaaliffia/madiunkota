<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Berita::create([
            'judul' => 'Berita Satu', 'deskripsi' => "sadbajhsd", "id_pengirim" => "1", "status_publish" => "1"
        ]);

        \App\Models\Berita::create([
            'judul' => 'Berita dua', 'deskripsi' => "sadbajhsd", "id_pengirim" => "1", "status_publish" => "1"
        ]);
    }
}
