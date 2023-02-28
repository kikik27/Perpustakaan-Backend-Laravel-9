@extends('layouts.nav')
@section('content')
<div class="container col-10 py-4">
    <a href="buku/add" class="btn btn-light my-3">Tambah</a>
    <center style="font-size: 24px;"></center> 
    <table class="table">
        <thead class="thead-light">
          <tr class="table-light">
            <th scope="col">Id Buku</th>
            <th scope="col">Nama Buku</th>
            <th scope="col">Nama Pengarang</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($buku as $data)
          <tr>
            <th class="table-light" scope="row">{{ $data->id_buku }}</th>
            <td class="table-light">{{ $data->nama_buku }}</td>
            <td class="table-light">{{ $data->nama_pengarang }}</td>
            <td class="table-light">

                  <a href="/buku/{{ $data->id_buku}}" class="btn btn-primary">Ubah</a>
                <form action="/buku/delete{{ $data->id_buku}}">
                    @method('DELETE')
                    @csrf
                <button type="submit" class="btn  btn-danger">Hapus</button>

                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    {{ $buku->Links('pagination::bootstrap-4')}}

</div>

@endsection