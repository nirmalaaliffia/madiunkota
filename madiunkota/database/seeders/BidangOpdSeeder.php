<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use app\Models\Bidang_opd;

class BidangOpdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bidang_opd::create([
            'nama_bidang' => 'Organisasi Perangkat Daerah'
        ]);
        Bidang_opd::create([
            'nama_bidang' => 'Layanan Masyarakat'
        ]);
        Bidang_opd::create([
            'nama_bidang' => 'Kecamatan'
        ]);
        Bidang_opd::create([
            'nama_bidang' => 'Link Terkait'
        ]);
        Bidang_opd::create([
            'nama_bidang' => 'Organisasi Masyarakat'
        ]);
        Bidang_opd::create([
            'nama_bidang' => 'PPID'
        ]);
        Bidang_opd::create([
            'nama_bidang' => 'Kelurahan'
        ]);
        Bidang_opd::create([
            'nama_bidang' => 'Media Sosial'
        ]);
    }
}
