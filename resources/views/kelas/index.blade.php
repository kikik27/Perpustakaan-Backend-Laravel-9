@extends('layouts.nav')
@section('content')
<div class="container col-10 py-4">
    <a href="kelas/add" class="btn btn-light my-3">Tambah</a>
    <center style="font-size: 24px;"></center> 
    <table class="table">
        <thead class="thead-light">
          <tr class="table-light">
            <th scope="col">No</th>
            <th scope="col">Nama Kelas</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($kelas as $data)
          <tr>
            <th class="table-light" scope="row">{{ $data->id_kelas }}</th>
            <td class="table-light">{{ $data->nama_kelas }}</td>
            <td class="table-light">

                  <a href="/kelas/{{ $data->id_kelas}}" class="btn btn-primary">Ubah</a>
                <form action="/kelas/delete{{ $data->id_kelas}}">
                    @method('DELETE')
                    @csrf
                <button type="submit" class="btn  btn-danger">Hapus</button>
                </form>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    {{ $kelas->Links('pagination::bootstrap-4')}}

</div>

@endsection