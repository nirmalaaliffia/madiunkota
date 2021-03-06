<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaKategorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita_kategoris', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('id_berita');
            $table->unsignedBigInteger('id_kategori');
          
            $table->foreign('id_berita')->references('id')->on('beritas');
            $table->foreign('id_kategori')->references('id')->on('kategoris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berita_kategoris');
    }
}
