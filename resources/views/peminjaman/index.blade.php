@extends('layouts.nav')
@section('content')
<div class="container col-10 py-4">
    <a href="peminjaman/add" class="btn btn-light my-3">Tambah</a>
    <center style="font-size: 24px;"></center> 
    <table class="table">
        <thead class="thead-light">
          <tr class="table-light">
            <th scope="col">No</th>
            <th scope="col">Nama Siswa</th>
            <th scope="col">Nama Buku</th>
            <th scope="col">Tanggal Peminjaman</th>
            <th scope="col">Status</th>
            <th scope="col">Denda</th>
            {{-- <th scope="col">Status Bayar Denda</th> --}}
          </tr>
        </thead>
        <tbody>
            @foreach ($peminjaman as $data)
          <tr>
            <th class="table-light" scope="row">{{ $data->id_peminjaman }}</th>
            <td class="table-light">{{ $data->nama_siswa }}</td>
            <td class="table-light">{{ $data->nama_buku }}</td>
            <td class="table-light">{{ $data->tanggal_peminjaman }}</td>

            <td class="table-light">
              @if ($data->status == 'belum_kembali')
                <a href="/peminjaman/kembali{{ $data->id_peminjaman}}" class="btn btn-info">Kembalikan Buku</a>
              @elseif($data->status == 'denda')
              <a href="/peminjaman/bayar{{ $data->id_peminjaman}}" class="btn btn-info">Bayar Denda</a>
              @elseif($data->status == 'lunas')
                <div class="alert alert-info">Sudah Dikembalikan Dan Denda Lunas</div>
                @elseif($data->status == 'tidak_didenda')
                <div class="alert alert-info">Sudah Dikembalikan Tepat Waktu</div>
              @endforelse
            </td>


              {{--  --}}
              @if ($data->denda == '0' && $data->status == 'tidak_didenda' )
                <td class="table-light">
                  <div class="alert alert-info">Tidak Ada Denda</div>
                </td>
              @else
                <td class="table-light">Rp {{ $data->denda }}</td>
              @endforelse

{{--               
              <td class="table-light">
              @if ($data->bayar == 'belum_kembali')
              <div class="alert alert-info">Belum Dikembalikan</div>
              @elseif ($data->bayar == 'belum_lunas')
              <a href="/peminjaman/bayar{{ $data->id_peminjaman}}" class="btn btn-info">Bayar</a>
              @else
              <div class="alert alert-info">Sudah Lunas</div>
              @endforelse
              </td> --}}
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $peminjaman->Links('pagination::bootstrap-4')}}
</div>

@endsection