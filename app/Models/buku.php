<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'buku';
    protected $primaryKey = 'id_buku';
    protected $fillable=['nama_buku','nama_pengarang'];
}
