<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\peminjaman;
use App\Models\siswa;
use App\Models\buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class peminjamanController extends Controller
{
    public function getPeminjaman(){
        // $peminjaman = DB::select('select * from peminjaman join buku on buku.id_buku = peminjaman.id_buku join siswa on siswa.id_siswa = peminjaman.id_siswa join kelas on kelas.id_kelas = kelas.id_kelas')->paginate(10);
        
        //paginate
        $peminjaman = DB::table('peminjaman')
                    ->join('siswa','peminjaman.id_siswa','=','siswa.id_siswa')->join('buku','peminjaman.id_buku','=','buku.id_buku')->join('kelas','siswa.id_kelas','=','kelas.id_kelas')->orderby('id_peminjaman')->paginate(6);
         
        return response()->json($peminjaman);
    }

    public function peminjaman(){
        $peminjaman = peminjaman::get();
        return response()->json($peminjaman);
    }

    public function jumlahPeminjaman(){
        $peminjaman = DB::table('peminjaman')->count();
        return response()->json($peminjaman);
    }

    public function jumlahDenda(){
        $peminjaman = DB::table('peminjaman')->sum('denda');
        return response()->json($peminjaman);
    }

    public function jumlahBukuBelumKembali(){
        $peminjaman = DB::table('peminjaman')->where('status','=','belum_kembali')->count();
        return response()->json($peminjaman);
    }

    public function createPeminjaman(Request $req){
        
        $validator = Validator::make($req->all(),[
            'id_siswa' => 'required',
            'id_buku' => 'required',
        ]);
        if($validator->fails()) {
            return Response()->json([
                'status'=>'error',
                'message'=>'Isi Form Dengan Lengkap !'
            ]);
        }

        $save = peminjaman::create([
            $now = date('Y-m-d'),
            'id_siswa'   =>$req->get('id_siswa'),
            'id_buku'    =>$req->get('id_buku'),
            'tanggal_peminjaman' =>$now,
            'tanggal_kembali' => null,
            'status' => 'belum_kembali',
            'denda' => '0',

        ]);

        if($save){
            return Response()->json(['status'=>"success",'message'=>'Sukses Pinjam Buku']);
        }else{
            return Response()->json(['status'=>"error",'message'=>'Gagal Pinjam Buku']);
        }
    }

    public function kembalikanPeminjaman(Request $req , peminjaman $id_peminjaman ){
        $date_1 = date('Y-m-d');
        $date_2 = $id_peminjaman->tanggal_peminjaman;
        $tenggat = \Carbon\Carbon::parse($date_2)->diffInDays($date_1);
        $perhari = '5000';
        $kembali = $date_1;
        $maxkembali = 3;

        if($tenggat <= $maxkembali){
            $status = 'tidak_didenda';
            $denda = '0';
        }elseif($tenggat >= $maxkembali){

            $status = 'denda';
            $denda = ($tenggat-$maxkembali) * $perhari;
        }else{
            $status='tidak_didenda';
            $denda = '0';
        }

        $ubah = peminjaman::where('id_peminjaman',$id_peminjaman->id_peminjaman)->update([
        'tanggal_kembali' => $kembali,
        'status' => $status,
        'denda' => $denda,
        ]);

        if($ubah){
            return Response()->json(['status'=>'success','message'=>'Sukses Kembalikan Buku']);
        }else{
            return Response()->json(['status'=>'error','message'=>'Gagal Kembalikan']);
        }
    }

    public function bayarPeminjaman($id_peminjaman ){

        $ubah = peminjaman::where('id_peminjaman',$id_peminjaman)->update([
        'status' => 'lunas'
        ]);

        if($ubah){
            return Response()->json(['status'=>'success','message'=>'Suskes Bayar Denda']);
        }else{
            return Response()->json(['status'=>'error','message'=>'Gagal Kembalikan']);
        }
    }


}
