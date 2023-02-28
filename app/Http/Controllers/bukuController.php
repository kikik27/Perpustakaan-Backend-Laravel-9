<?php

namespace App\Http\Controllers;
use App\Models\buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class bukuController extends Controller
{
    public function getbuku(Request $req){
        $dt_buku = DB::table('buku')->paginate(7);
        return response()->json($dt_buku);
    }

    public function allbuku(){
        $dt_buku = buku::get();
        return response()->json($dt_buku);
    }

    public function jumlahBuku(){
        $buku = DB::table('buku')->count();
        return response()->json($buku);
    }

    public function createbuku (Request $req){

        $validator = Validator::make($req->all(),[
            'nama_buku' => 'required',
            'nama_pengarang' => 'required'

        ]);
        if($validator->fails()) {
            return Response()->json([
                'status'=>'error',
                'message'=>'Isi Form Dengan Lengkap !'
            ]);
        }

        $save = buku::create([
           'nama_buku'    =>$req->get('nama_buku'),
           'nama_pengarang' =>$req->get('nama_pengarang')
        ]);

        if($save){
            return Response()->json(['status'=>'success','message'=>'Sukses Menambah Buku']);
        }else{
            return Response()->json(['status'=>'error','message'=>'Gagal Menambah Buku']);
        }
    }

    public function editBuku(buku $id_buku){
        return view('buku/edit', compact('id_buku'));
    }

    public function deleteBuku($id_buku){
    
        $hapus = buku::where('id_buku',$id_buku)->delete();
        if($hapus){
            return Response()->json(['status'=>'success','message'=>'Sukses Hapus Buku']);
        }else{
            return Response()->json(['status'=>'success','message'=>'Gagal Hapus Buku']);
        }
        
        }

        public function updateBuku(Request $req, $id_buku){

            $validator = Validator::make($req->all(),[
                'nama_buku' => 'required',
                'nama_pengarang' => 'required'
            ]);
            if($validator->fails()) {
                return Response()->json([
                    'status'=>'error',
                    'message'=>'Isi Form Dengan Lengkap !'
                ]);
            }
    
            $ubah = buku::where('id_buku',$id_buku)->update([
               'nama_buku'    =>$req->get('nama_buku'),
               'nama_pengarang'    =>$req->get('nama_pengarang'),
            ]);
    
            if($ubah){
                return Response()->json(['status'=>'success','message'=>'Sukses Ubah Buku']);
            }else{
                return Response()->json(['status'=>'error','message'=>'Gagal Ubah Buku']);
            }
        }
}

