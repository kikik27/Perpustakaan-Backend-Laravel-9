@extends('layouts.nav')
@section('content')
<div class="container col-10 bg-light my-5">
    <div class="col-md py-5">
    <h3>Peminjaman Baru</h3>
<form action="/peminjaman" method="POST">
    @csrf
    <label for="siswa">Nama Siswa :</label>
    <select id="siswa" name="id_siswa" class="form-control">
        <option value="">Pilih Siswa</option>
        <?php foreach($dt_siswa as $dt_siswa): ?>
        <option value="{{ $dt_siswa->id_siswa }}">{{ $dt_siswa->nama_siswa }}</option>
        <?php endforeach;?>
    </select>

    <label for="buku">Nama Buku :</label>
    <select id="buku" name="id_buku" class="form-control">
        <option value="">Pilih Buku</option>
        <?php foreach($dt_buku as $dt_buku): ?>
        <option value="{{ $dt_buku->id_buku }}">{{ $dt_buku->nama_buku }}</option>
        <?php endforeach;?>
    </select>
    
    <a href="/peminjaman" class="btn btn-danger my-3 mx-3" style="float:right">Batal</a>
    <button type="submit" class="btn btn-primary my-3" style="float:right">Simpan</button>
    <br>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-
gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
</script>
    </div>
</div>
@endsection