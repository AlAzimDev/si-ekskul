<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Answer;
use App\DataSoal;
use App\Soal;
use App\User;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index(){
        //id_user yang ada di answer
        $id_datasoals = Answer::whereNotNull('persentasi')->pluck('id_datasoal')->toArray();
        $id_users = Answer::whereNotNull('persentasi')->pluck('id_user')->toArray();
        
        //id_user yang ada di answer
        $id_soals = DataSoal::whereIn('id',$id_datasoals)->pluck('id_soal')->toArray();

        $soals = Soal::whereIn('id',$id_soals)->get();
        // $allusers = User::where('role',0)->get();
        // dd($soals);
        // dd($deletethis->first());
        return view('admins.nilai.index', compact('soals','id_users'));
    }
    public function detail_nilai($id, $judul_soal, $id_user, $name)
    {
        try {
            if(Soal::where([['id',$id],['judul_soal',$judul_soal]])->first()){
                if(User::where([['id',$id_user],['name',$name]])->first()){
                    $id_datasoals = DataSoal::where('id_soal',$id)->pluck('id')->toArray();
                    $jawabans = Answer::whereIn('id_datasoal', $id_datasoals)->where('id_user',$id_user)->get();
                    return view('admins.jawaban.detail-jawaban', compact('jawabans'));
                }
                return abort(404);
            }
            return abort(404);
        } catch (\Throwable $th) {
            // dd($th);
            return abort(404);
        }
    }
}
