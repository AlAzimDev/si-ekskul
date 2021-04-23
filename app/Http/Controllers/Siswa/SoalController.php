<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;

use App\DataSiswa;
use App\Soal;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
Use Alert;

class SoalController extends Controller
{
    public function index($id,$data){
        try{
            if(!Auth::check()){
                return redirect('login');
            }

            $timeNow    = Carbon::now();
            $soal = Soal::find($id);

            if(($timeNow->diff($soal->waktu_mulai)->format('%r') == "-")&&($timeNow->diff($soal->waktu_berhenti)->format('%r') == "")){
                DataSiswa::where('id_user',Auth::User()->id)->update(['id_soal' => $id]);
                $data = $soal->data_soal;
                return view('siswas.soal.index',compact('data'));
            }else if($timeNow->diff($soal->waktu_mulai)->format('%r') == ""){
                alert()->info('Maaf','Sesi menjawab soal belum dimulai');
                DataSiswa::where('id_user',Auth::User()->id)->update(['id_soal' => NULL]);
                return redirect()->Route('siswa-profile');
            }else if($timeNow->diff($soal->waktu_berhenti)->format('%r') == "-"){
                alert()->warning('Maaf','Sesi menjawab soal telah selesai');
                DataSiswa::where('id_user',Auth::User()->id)->update(['id_soal' => NULL]);
                return redirect()->Route('siswa-profile');
            }

            //Jika User Tidak Sedang Menjawab Soal
            if(DataSiswa::where('id_user',Auth::User()->id)->first()->id_soal == NULL){
                return redirect()->Route('siswa-profile');
            }

            //True
            if($data == Str::slug($soal->judul_soal.$soal->id, " ")){
                $data = $soal->data_soal;
                return view('siswas.soal.index',compact('data'));
            }
        }catch(\Exception $e){
            alert()->warning('Maaf','Soal tidak ditemukan!');
            return redirect()->Route('siswa-profile');
        }
    }
}
