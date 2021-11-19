<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\profil::create([
            'kategori_profil' => 'Sejarah', 'deskripsi' => null, 'foto_thumbnail' => null, 'id_pengirim' => null
        ]);
        \App\Models\profil::create([
            'kategori_profil' => 'Visi-Misi', 'deskripsi' => null, 'foto_thumbnail' => null, 'id_pengirim' => null
        ]);
        \App\Models\profil::create([
            'kategori_profil' => 'Profil-pimpinan', 'deskripsi' => null, 'foto_thumbnail' => null, 'id_pengirim' => null
        ]);
        \App\Models\profil::create([
            'kategori_profil' => 'Wilayah-geografis', 'deskripsi' => null, 'foto_thumbnail' => null, 'id_pengirim' => null
        ]);
    }
}
