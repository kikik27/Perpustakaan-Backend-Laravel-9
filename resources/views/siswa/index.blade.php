@extends('layouts.nav')
@section('content')
<div class="container col-10 py-4">
    <a href="siswa/add" class="btn btn-light my-3">Tambah</a>
    <center style="font-size: 24px;"></center> 
    <table class="table">
        <thead class="thead-light">
          <tr class="table-light">
            <th scope="col">NISN</th>
            <th scope="col">Nama Siswa</th>
            <th scope="col">Kelas</th>
            <th scope="col">Tanggal lahir</th>
            <th scope="col">Gender</th>
            <th scope="col">Alamat</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $data)
          <tr>
            <th class="table-light" scope="row">{{ $data->id_siswa }}</th>
            <td class="table-light">{{ $data->nama_siswa }}</td>
            <td class="table-light">{{ $data->nama_kelas }}</td>
            <td class="table-light">{{ $data->tanggal_lahir }}</td>
            <td class="table-light">{{ $data->gender }}</td>
            <td class="table-light">{{ $data->alamat }}</td>
            <td class="table-light">
                  <a href="/siswa/{{ $data->id_siswa}}" class="btn btn-primary">Ubah</a>
                  
                <form action="/siswa/delete{{ $data->id_siswa}}">
                    @method('DELETE')
                    @csrf
                <button type="submit" class="btn  btn-danger">Hapus</button>
                </form>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$siswa->Links('pagination::bootstrap-4')}}
</div>

@endsection