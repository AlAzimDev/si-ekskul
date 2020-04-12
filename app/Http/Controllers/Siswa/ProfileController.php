<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataSiswa;
use App\User;
use App\Notifikasi;
use Auth;

class ProfileController extends Controller
{
    public function index(){
        $id     = Auth::User()->id;
        $siswa  = User::find($id);
        $data   = $siswa->data_siswa;
        if($data->jenis_kelamin == 'll'){
            $data->jenis_kelamin = 'Laki-laki';
        }else{
            $data->jenis_kelamin = 'Perempuan';
        }
        return view('siswas.index',compact('data'));
    }
    public function hapus_notifikasi($id){
        try {
            $notif = Notifikasi::find($id);
            if(Auth::User()->id == $notif->id_user){
                $notif->delete();
            }
            alert()->success('Sukses','Notifikasi berhasil dihapus');
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->warning('Maaf','Terjadi masalah dalam menghapus notifikasi');
            return redirect()->back();
        }
    }
    public function clear_notifikasi(){
        // try {
            $notif = Notifikasi::where('id_user',Auth::User()->id)->get();
            foreach ($notif as $data) {
                $data->update(['status' => 1]);
            }
        // } catch (\Throwable $th) {
        // }
    }
}
