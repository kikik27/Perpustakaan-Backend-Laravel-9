<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';
    protected $foreignKey=['id_kelas','id_buku'];
    protected $fillable = ['id_siswa','id_buku','tanggal_peminjaman','tanggal_kembali','status','denda'];
}
