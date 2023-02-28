@extends('layouts.nav')
@section('content')
<div class="container col-10 bg-light my-5">
    <div class="col-md py-5">
    <h3>Tambah Siswa</h3>
<form action="/siswa" method="POST">
    @csrf
    Nama Siswa :
    <input type="text" name="nama_siswa" value="" class="form-control">

    Tanggal Lahir :
    <input type="date" name="tanggal_lahir" value="" class="form-control">

    Gender :
    <select name="gender" class="form-control">
    <option></option>
    <option value="Laki-Laki">Laki-laki</option>
    <option value="Perempuan">Perempuan</option>
    </select>

    Alamat :
    <textarea name="alamat" class="form-control" rows=""></textarea>

    Kelas :
    <select name="id_kelas" class="form-control">
        <option value="">Pilih Kelas</option>
        <?php foreach($kelas as $kelas): ?>
        <option value="{{ $kelas->id_kelas }}">{{ $kelas->nama_kelas }}</option>
        <?php endforeach;?>
    </select>
    <a href="/siswa" class="btn btn-danger my-3 mx-3" style="float:right">Batal</a>
    <button type="submit" class="btn btn-primary my-3" style="float:right">Simpan</button>
    <br>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-
gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
</script>
    </div>
</div>
@endsection