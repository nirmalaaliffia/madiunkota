<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BidangOpdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Bidang_opd::create([
            'nama_bidang' => 'Organisasi Perangkat Daerah'
        ]);
        \App\Models\Bidang_opd::create([
            'nama_bidang' => 'Layanan Masyarakat'
        ]);
        \App\Models\Bidang_opd::create([
            'nama_bidang' => 'Kecamatan'
        ]);
        \App\Models\Bidang_opd::create([
            'nama_bidang' => 'Link Terkait'
        ]);
        \App\Models\Bidang_opd::create([
            'nama_bidang' => 'Organisasi Masyarakat'
        ]);
        \App\Models\Bidang_opd::create([
            'nama_bidang' => 'PPID'
        ]);
        \App\Models\Bidang_opd::create([
            'nama_bidang' => 'Kelurahan'
        ]);
        \App\Models\Bidang_opd::create([
            'nama_bidang' => 'Media Sosial'
        ]);
    }
}
