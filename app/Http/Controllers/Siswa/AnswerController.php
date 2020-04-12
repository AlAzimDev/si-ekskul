<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Answer;
use App\DataSiswa;
use Auth;

class AnswerController extends Controller
{
    public function jawab($id, $jawaban){
        if($jawaban == "NULL"){
            Answer::updateOrCreate(['id_datasoal' => $id, 'id_user' => Auth::User()->id],['jawaban' => NULL]);
        }else{
            Answer::updateOrCreate(['id_datasoal' => $id, 'id_user' => Auth::User()->id],['jawaban' => $jawaban]);
        }
    }
    public function selesaikan(){
        DataSiswa::where('id_user',Auth::User()->id)->update(['id_soal' => NULL]);
        return redirect()->Route('siswa-profile');
    }
}
