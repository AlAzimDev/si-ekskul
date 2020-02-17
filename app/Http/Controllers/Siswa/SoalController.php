<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;

use App\DataSiswa;
use App\Soal;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SoalController extends Controller
{
    public function index($id,$data){
        $timeNow    = Carbon::now();
        $soal = Soal::find($id);
        if(($timeNow->diff($soal->waktu_mulai)->format('%r') == "-")&&($timeNow->diff($soal->waktu_berhenti)->format('%r') == "")){
            DataSiswa::where('id_user',Auth::User()->id)->update(['id_soal' => $id]);
        }else if($timeNow->diff($soal->waktu_mulai)->format('%r') == ""){
            dd('Belum dimulai');
        }else if($timeNow->diff($soal->waktu_berhenti)->format('%r') == "-"){
            dd('Waktu sudah habis');
        }
        if($data == Str::slug($soal->judul_soal.$soal->id, " ")){
            $data = $soal->data_soal;
            return view('siswas.soal.index',compact('data'));
        }
    }
}
