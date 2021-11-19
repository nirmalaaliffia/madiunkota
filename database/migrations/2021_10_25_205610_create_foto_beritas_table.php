<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoBeritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_beritas', function (Blueprint $table) {
            $table->id();
            $table->string('path_foto')->nullable(false);
            $table->unsignedBigInteger('id_berita')->nullable(false);
            $table->foreign('id_berita')->references('id')->on('beritas');
            $table->string('nama_foto')->nullable(true);
            $table->SmallInteger('status_thumbnail')->nullable(true);
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foto_beritas');
    }
}
