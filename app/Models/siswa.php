<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="siswa";
    protected $primaryKey="id_siswa";
    protected $foreignKey="id_kelas";
    protected $fillable=['id_kelas','nama_siswa','tanggal_lahir','gender','alamat'];
    
}
