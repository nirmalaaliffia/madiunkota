<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
        \app\Models\Kategori::create([
            'jenis_kategori' => 'Berita','warna_label' => 'Red','status_aktif' => '1'
        ]);

        \app\Models\Kategori::create([
            'jenis_kategori' => 'Tabloid', 'warna_label' => 'Blue','status_aktif' => '1'
        ]);
        \app\Models\Kategori::create([
            'jenis_kategori' => 'Pengumuman', 'warna_label' => 'Green','status_aktif' => '1'
        ]);
        \app\Models\Kategori::create([
            'jenis_kategori' => 'lowongan', 'warna_label' => 'Brown','status_aktif' => '1'
        ]);
        
        \app\Models\Kategori::create([
            'jenis_kategori' => 'Arsip', 'warna_label' => 'Yellow','status_aktif' => '1'
        ]);
        \app\Models\Kategori::create([
            'jenis_kategori' => 'Dokumen', 'warna_label' => 'purple','status_aktif' => '1'
        ]);
        \app\Models\Kategori::create([
            'jenis_kategori' => 'Informasi', 'warna_label' => 'teal','status_aktif' => '1'
        ]);
        \app\Models\Kategori::create([
            'jenis_kategori' => 'Kegiatan Pemkot', 'warna_label' => 'fuschia','status_aktif' => '1'
        ]);
        \app\Models\Kategori::create([
            'jenis_kategori' => 'Kegiatan Walikota', 'warna_label' => 'navy','status_aktif' => '1'
        ]);
        \app\Models\Kategori::create([
            'jenis_kategori' => 'Data Penduduk 2019', 'warna_label' => 'lime','status_aktif' => '1'
        ]);
        \app\Models\Kategori::create([
            'jenis_kategori' => 'Foto', 'warna_label' => 'lime','status_aktif' => '1'
        ]);
        \app\Models\Kategori::create([
            'jenis_kategori' => 'Video', 'warna_label' => 'black','status_aktif' => '1'
        ]);
  

    }
}
