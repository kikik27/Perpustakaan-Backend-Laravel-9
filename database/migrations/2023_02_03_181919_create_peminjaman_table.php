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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('id_peminjaman');
            $table->integer('id_siswa');
            $table->integer('id_buku');
            $table->String('tanggal_peminjaman');
            $table->enum(['belum_dikembalikan','sudah_dikembalikan']);
            $table->String('tanggal_pengembalian');
            $table->string('denda');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
};
