<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use App\Soal;
use App\User;
use App\Answer;
use App\DataSoal;
use App\Notifikasi;
use Carbon\Carbon;

class AnswerController extends Controller
{
    public function index(){
        //id_user yang ada di answer
        $id_datasoals = [];
        $answers = Answer::where([['persentasi',NULL]])->get();
        foreach($answers as $answer){
            $id_datasoals[] = $answer->id_datasoal;
        }

        //id_user yang ada di answer
        $id_soals = [];
        $datasoals = DataSoal::whereIn('id',$id_datasoals)->get();
        foreach($datasoals as $datasoal){
            $id_soals[] = $datasoal->id_soal;
        }

        $soals = Soal::whereIn('id',$id_soals)->get();
        return view('admins.jawaban.index', compact('soals'));
    }
    public function user_jawaban($id, $judul_soal){
        try {
            //cek sesi soal berakhir
            $timeNow    = Carbon::now();
            if($timeNow->diff(Soal::find($id)->waktu_berhenti)->format('%r') == "-"){
                //id_user yang ada di answer
                $id_datasoals = [];
                $answers = Answer::where([['persentasi',NULL]])->get();
                foreach($answers as $answer){
                    $id_datasoals[] = $answer->id_datasoal;
                }
        
                //id_user yang ada di answer
                $id_soals = [];
                $datasoals = DataSoal::whereIn('id',$id_datasoals)->get();
                foreach($datasoals as $datasoal){
                    $id_soals[] = $datasoal->id_soal;
                }
                
                //cek apakah soal tersebut memiliki persentasi yang kosong?
                $soal = Soal::whereIn('id',$id_soals)->where([['id',$id],['judul_soal',$judul_soal]])->first();
    
                //id_datasoal yang ada di soal
                $id_datasoals = [];
                $datasoals = DataSoal::where([['id_soal',$soal->id]])->get();
                foreach($datasoals as $datasoal){
                    $id_datasoals[] = $datasoal->id;
                }
    
                //id_user yang ada di answer
                $id_users = [];
                $answers = Answer::whereIn('id_datasoal',$id_datasoals)->where([['persentasi',NULL]])->get();
                foreach($answers as $answer){
                    $id_users[] = $answer->id_user;
                }
                if($soal->count() > 0){
                    $users = User::whereIn('id', $id_users)->where('role', 0)->get(); //siswa yang persentasi jawaban masih 0
                    return view('admins.jawaban.user-jawaban', compact('users','id','judul_soal'));
                }
            }else{
                alert()->warning('Maaf','Sesi menjawab soal belum selesai');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            // dd($th);
            return redirect()->back();
        }
    }
    public function periksa_jawaban($id, $judul_soal, $id_user, $name){
        try {
            //cek sesi soal berakhir
            $timeNow    = Carbon::now();
            if($timeNow->diff(Soal::find($id)->waktu_berhenti)->format('%r') == "-"){
                //id_user yang ada di answer
                $id_datasoals = [];
                $answers = Answer::where([['persentasi',NULL]])->get();
                foreach($answers as $answer){
                    $id_datasoals[] = $answer->id_datasoal;
                }
        
                //id_user yang ada di answer
                $id_soals = [];
                $datasoals = DataSoal::whereIn('id',$id_datasoals)->get();
                foreach($datasoals as $datasoal){
                    $id_soals[] = $datasoal->id_soal;
                }
                
                //cek apakah soal tersebut memiliki persentasi yang kosong?
                $soal = Soal::whereIn('id',$id_soals)->where([['id',$id],['judul_soal',$judul_soal]])->first();

                //id_datasoal yang ada di soal
                $id_datasoals = [];
                $datasoals = DataSoal::where([['id_soal',$soal->id]])->get();
                foreach($datasoals as $datasoal){
                    $id_datasoals[] = $datasoal->id;
                }

                //id_user yang ada di answer
                $id_users = [];
                $answers = Answer::whereIn('id_datasoal',$id_datasoals)->where([['persentasi',NULL]])->get();
                foreach($answers as $answer){
                    $id_users[] = $answer->id_user;
                }
                $users = User::whereIn('id', $id_users)->where([['name', $name],['id',$id_user]])->get(); //siswa yang persentasi jawaban masih 0
                if($users->count() > 0){
                    $answers2 = Answer::where([['id_user',$users->first()->id],['persentasi',NULL]])->get();
                    return view('admins.jawaban.jawaban', compact('answers2'));
                }
                return abort(500);
            }else{
                alert()->warning('Maaf','Sesi menjawab soal belum selesai');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            // dd($th);
            return abort(500);
        }
    }
    public function store(Request $request){
        try{
            if(count($request->persentasi) > 0){
                foreach($request->persentasi as $item=>$v){
                    Answer::where('id',$request->id[$item])->update(['persentasi' => $request->persentasi[$item]]);
                    $id_user = $request->id[$item];
                }
                $notifikasi = New Notifikasi;
                $notifikasi->judul_notifikasi = 'Jawaban Anda Telah Diperiksa';
                $notifikasi->isi_notifikasi = 'tap disini untuk melihat lebih detail';
                $notifikasi->url = 'siswa/absensi-nilai';
                $notifikasi->id_user = $id_user;
                $notifikasi->status = 0;
                $notifikasi->save();
                alert()->success('Berhasil','Data berhasil disimpan');
                return redirect()->route('admin-nilai-home');
            }else{
                alert()->warning('Maaf','Data gagal disimpan');
                return redirect()->route('admin-nilai-home');
            }
        }catch(Exception $e){
            alert()->warning('Maaf','Data gagal disimpan');
            return redirect()->route('admin-nilai-home');
        }
    }
}
