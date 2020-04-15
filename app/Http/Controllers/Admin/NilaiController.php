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
        $allusers = User::where('role',0)->get();
        
        //id_user yang ada di answer
        $id_soals = DataSoal::whereIn('id',$id_datasoals)->pluck('id_soal')->toArray();

        $soals = Soal::whereIn('id',$id_soals)->orderBy('id','DESC')->get();
        // $allusers = User::where('role',0)->get();
        // dd($soals);
        // dd($deletethis->first());
        return view('admins.nilai.index', compact('soals','allusers'));
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
    public function nilai($id, $judul_soal)
    {
        // try {
            if(Soal::where([['id',$id],['judul_soal',$judul_soal]])->first()){
                $id_datasoals = DataSoal::where('id_soal',$id)->pluck('id')->toArray();
                $answer = Answer::whereIn('id_datasoal',$id_datasoals);
                $id_users = Answer::whereIn('id_datasoal',$id_datasoals)->whereNotNull('persentasi')->pluck('id_user')->toArray();
                // dd($id_users);
                $allusers = User::whereIn('id',$id_users)->get();
                return view('admins.nilai.detail-nilai', compact('allusers','id','judul_soal','answer','id_datasoals'));
            }
            return abort(404);
        // } catch (\Throwable $th) {
        //     // dd($th);
        //     return abort(404);
        // }
    }
}
