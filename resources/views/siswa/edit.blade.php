@extends('layouts.nav')
@section('content')
<div class="container col-10 bg-light my-5">
    <div class="col-md py-5">
    <h3>Edit Siswa</h3>
<form action="/siswa/edit{{ $id_siswa->id_siswa }}" method="POST">
    @method('PUT')
    @csrf
    Nama Siswa :
    <input type="text" name="nama_siswa" value="{{ $id_siswa->nama_siswa }}" class="form-control">

    Tanggal Lahir :
    <input type="date" name="tanggal_lahir" value="{{ $id_siswa->tanggal_lahir }}" class="form-control">

    Gender :
    <select name="gender" class="form-control">
        <option value="">Pilih Gender</option>
        @foreach ($gender as $gender )
        <option value="{{ $gender}}"{{ $gender == $id_siswa->gender ? 'selected':null }}>{{ $gender }}</option>
        @endforeach
    </select>

    Alamat :
    <textarea name="alamat" class="form-control" rows="">{{ $id_siswa->alamat }}</textarea>

    Kelas :
    <select name="id_kelas" class="form-control">
        <option value="">Pilih Kelas</option>
    @foreach ($dt_kelas as $kelas )
        <option value="{{ $kelas->id_kelas }}"{{ $id_siswa->id_kelas == $kelas->id_kelas ? 'selected' : null }}>{{ $kelas->nama_kelas }}</option>
    @endforeach
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