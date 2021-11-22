<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('bidang_opds', function (Blueprint $table) {
            $table->id(); 
            $table->string('nama_bidang')->nullable(false);
            
        });
        
        Schema::create('opds', function (Blueprint $table) {
            $table->id();
            $table->string('nama_opd')->nullable(false);
            $table->UnsignedBigInteger('id_bidang')->nullable(false);
            // $table->foreign('id_bidang')->references('id_bidang')->on('bidang_opds');
            $table->string('alamat_opd')->nullable(true);
            $table->string('no_telp')->nullable(true);
            $table->string('no_fax')->nullable(true);
            $table->string('lokasi_gps')->nullable(true);
            
            $table->foreign('id_bidang')->references('id')->on('bidang_opds');

        });

    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bidang_opds');
        Schema::dropIfExists('opds');
    }
}
