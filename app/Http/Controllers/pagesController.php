<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function index (){
        return view ('pages.index');
    }

    public function siswa(){
        return view ('pages.siswa');
    }

    public function buku(){
        return view ('pages.buku');
    }

    public function kelas(){
        return view ('pages.kelas');
    }
}
