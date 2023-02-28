<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id('id_siswa');
            $table->bigInteger('id_kelas')->unsigned();
            $table->String('nama_siswa');
            $table->String('tanggal_lahir');
            $table->String('gender');
            $table->longText('alamat');
        });

        // Schema::table('siswa', function (Blueprint $table) {
        //     $table->foreign('id_kelas')->references('id_kelas')->on('kelas');
        // });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};


