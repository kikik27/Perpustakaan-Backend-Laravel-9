<?php

namespace App\Http\Controllers;
use App\Models\kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class kelasController extends Controller
{
    public function getKelas(Request $req){
        $dt_kelas = DB::table('kelas')->orderby('nama_kelas')->paginate(7);
        return response()->json($dt_kelas);
    }

    public function allkelas(){
        $dt_kelas = kelas::get();
        return response()->json($dt_kelas);
    }

    public function jumlahKelas(){
        $kelas = DB::table('kelas')->count();
        return response()->json($kelas);
    }

    public function createKelas (Request $req){

        $validator = Validator::make($req->all(),[
            'nama_kelas' => 'required',
        ],[
            'nama_kelas.required' => 'Nama Kelas Wajib Disi !',
        ]);
        if($validator->fails()) {
            return Response()->json([
                'status'=>'error',
                'message'=>'Isi Form Dengan Lengkap !'
            ]);
        }

        $save = kelas::create([
           'nama_kelas'    =>$req->get('nama_kelas'),
        ]);

        if($save){
            return response()->json(['status'=>"success",'message'=>'Sukses Menambah Kelas']);
        }else{
            return Response()->json(['status'=>"error",'message'=>'Gagal Menambah kelas']);
        }
    }

    public function deleteKelas($id_kelas){
    
        $hapus = kelas::where('id_kelas',$id_kelas)->delete();
        if($hapus){
            return Response()->json(['status'=>'success','message'=>'Sukses Hapus kelas']);
        }else{
            return Response()->json(['status'=>'Gagal','message'=>'Gagal Hapus kelas']);
        }
        
        }

        public function updateKelas(Request $req, $id_kelas){

            $validator = Validator::make($req->all(),[
                'nama_kelas' => 'required',
            ]);
            if($validator->fails()) {
                return Response()->json([
                    'status'=>'error',
                    'message'=>$validator->errors()
                ]);
            }
    
            $ubah = kelas::where('id_kelas',$id_kelas)->update([
               'nama_kelas'    =>$req->get('nama_kelas'),
            ]);
    
            if($ubah){
                return Response()->json(['status'=>'success','message'=>'Sukses Ubah Kelas']);
            }else{
                return Response()->json(['status'=>'errror','message'=>'Gagal Ubah Kelas']);
            }
        }

}

