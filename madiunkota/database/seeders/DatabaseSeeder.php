<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\berita;
use App\Models\kategori;
use app\Models\profil;
use app\Models\opd;
use app\Models\foto_berita;
use app\Models\Bidang_opd;
use app\Models\alamat_opd;
use app\Models\file_berita;
use Monolog\Handler\InsightOpsHandler;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Admin', 'email' => 'madiunkota@admin.com', 'email_verified_at' => '2021-11-09 13:08:44.000', 'password' => '$2y$10$yWhsFwNg5keZVMibqnM4BeAsCaINAK.JDfhCGoFgruU9jteVONdWi' , 'created_at' => '2021-11-11 12:35:23.000', 'updated_at' => '2021-11-11 12:35:23.000'
        ]);
            $this->call(KategoriSeeder::class);
            $this->call(BidangOpdSeeder::class);
            $this->call(ProfilSeeder::class);

    }
}
