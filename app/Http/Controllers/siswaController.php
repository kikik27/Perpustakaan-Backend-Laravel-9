<?php

namespace App\Http\Controllers;
use App\Models\siswa;
use App\Models\kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class siswaController extends Controller
{
    //lihat data / ambil data
    public function getSiswa(){
        $siswa = DB::table('siswa')->join('kelas','siswa.id_kelas','=','kelas.id_kelas')->orderby('id_siswa')->paginate(7);
        return response()->json($siswa);
    }
    public function dataSiswa(){
        $siswa = siswa::get();   
        return response()->json($siswa);
    }

    public function jumlahSiswa(){
        $siswa = DB::table('siswa')->count();
        return response()->json($siswa);
    }


    public function createSiswa(Request $req){
        
        $validator = Validator::make($req->all(),[
            'id_kelas' => 'required',
            'nama_siswa' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
        ],[
            'id_kelas.required' => 'Data Kelas Wajib Disi !',
            'nama_siswa.required' => 'Nama Siswa Wajib Disi !',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib Disi !',
            'gender.required' => 'Gender Siswa Wajib Disi !',
            'alamat.required' => 'Alamat Siswa Wajib Disi !',
        ]);

        if($validator->fails()) {
            return Response()->json([
                'status'=>'error',
                'message'=>$validator->errors()
            ]);
        }

        $save = siswa::create([
        'id_kelas'      =>$req->get('id_kelas'),
           'nama_siswa'    =>$req->get('nama_siswa'),
           'tanggal_lahir' =>$req->get('tanggal_lahir'),
           'gender'        =>$req->get('gender'),
           'alamat'        =>$req->get('alamat')
        
        ]);

        if($save){
            return response()->json(['status'=>"success",'message'=>'Sukses Menambah Siswa']);
        }else{
            return response()->json(['status'=>"error",'message'=>'Gagal Menambah Siswa']);
        }
    }

        //update data
    public function updateSiswa(Request $req, $id_siswa){

        $validator = Validator::make($req->all(),[
            'id_kelas' => 'required',
            'nama_siswa' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
        ]);
        if($validator->fails()) {
            return Response()->json([
                'status'=>'error',
                'message'=>$validator->errors()
            ]);
        }

        $ubah = siswa::where('id_siswa',$id_siswa)->update([
            'id_kelas'      =>$req->get('id_kelas'),
           'nama_siswa'    =>$req->get('nama_siswa'),
           'tanggal_lahir' =>$req->get('tanggal_lahir'),
           'gender'        =>$req->get('gender'),
           'alamat'        =>$req->get('alamat')
        ]);

        if($ubah){
            return Response()->json(['status'=>'success','message'=>'Sukses Ubah Siswa']);
        }else{
            return Response()->json(['status'=>"error",'message'=>'Gagal Ubah Siswa']);
        }
    }

    public function deleteSiswa($id_siswa){
    
    $hapus = Siswa::where('id_siswa',$id_siswa)->delete();
    if($hapus){
        return Response()->json(['status'=>'success','message'=>'Sukses Hapus Siswa']);
    }else{
        return Response()->json(['status'=>'error','message'=>'Gagal Hapus Siswa']);
    }
    
    }

    

    
}
