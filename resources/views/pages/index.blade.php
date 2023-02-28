@extends('layouts.nav')
@section('content')
<div class="container col-10 py-5">
  <center style="font-size: 24px;"></center>  
  <div class="card-deck py-5 text-primary">
    <div class="card col-3 py-5 ">
      <img src="https://cdn-icons-png.flaticon.com/512/749/749065.png" alt="" class="card-img">
      <div class="card-body" style="text-align: center;">
        <h4 class="card-text py-3">Data Siswa</h4>
        <a href="/siswa" class="btn btn-primary btn-lg">Go</a></a>
      </div>
    </div>
    <div class="card col-4 py-5">
      <img src="https://cdn-icons-png.flaticon.com/512/9473/9473824.png" alt="" class="card-img">
      <div class="card-body" style="text-align: center;">
        <h4 class="card-text py-3">Data Kelas</h4>
        <a href="/kelas" class="btn btn-primary btn-lg">Go</a>
      </div>
    </div>
    <div class="card col-4 py-5">
      <img src="https://cdn-icons-png.flaticon.com/512/9221/9221425.png" alt="" class="card-img">
      <div class="card-body" style="text-align: center;">
        <h4 class="card-text py-3">Data Buku</h4>
        <a href="/buku" class="btn btn-primary btn-lg">Go</a>
      </div>
    </div>
    <div class="card col-4 py-5">
      <img src="https://cdn-icons-png.flaticon.com/512/1001/1001259.png" alt="" class="card-img">
      <div class="card-body" style="text-align: center;">
        <h4 class="card-text py-3">Data Peminjaman</h4>
        <a href="/peminjaman" class="btn btn-primary btn-lg">Go</a>
      </div>
    </div>
    
  </div>

</div>
@endsection