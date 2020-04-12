<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Absensi;
use App\Answer;
use App\DataAbsen;
use App\DataSoal;
use App\Soal;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use Alert;

class AbsensiController extends Controller
{
    public function index(){
        //id_user yang ada di answer
        $id_datasoals = Answer::whereNotNull('persentasi')->where('id_user',Auth::User()->id)->pluck('id_datasoal')->toArray();
        
        //id_user yang ada di answer
        $id_soals = DataSoal::whereIn('id',$id_datasoals)->get()->pluck('id_soal')->toArray();

        $soals = Soal::whereIn('id',$id_soals)->get();
        $users = User::where('id',Auth::User()->id)->get();
        $d_absen    = DataAbsen::where('id_user',Auth::User()->id)->get();
        $c_absen    = count($d_absen);
        return view('siswas.absensi.index', compact('c_absen','soals','users'));
    }
    public function absen($id, $data){
        try {
            $r_absen    = Absensi::find($id);
            if($data == Str::slug($r_absen->materi_pembelajaran.$r_absen->id, " ")){
                $d_absen    = DataAbsen::where([['id_absen',$id],['id_user',Auth::User()->id]])->first();
                if($d_absen != null){
                    alert()->info('Anda sudah melakukan absen!','');
                    return redirect()->route('siswa-profile');
                }else if(Carbon::now()->diffInMinutes($r_absen->created_at) > 60){
                    alert()->info('Maaf waktu absen telah usai!','');
                    return redirect()->route('siswa-profile');
                }else{
                    $absen  = new DataAbsen();
                    $absen->id_absen    = $id;
                    $absen->id_user     = Auth::User()->id;
                    $absen->save();
                    alert()->success('Berhasil absen','');
                    return redirect()->route('siswa-profile');
                }
            }
            return redirect()->route('siswa-profile');
        } catch (\Exception $th) {
            report($th);
        }
    }
    public function detail_nilai($id, $judul_soal, $id_user, $name)
    {
        try {
            if(Soal::where([['id',$id],['judul_soal',$judul_soal]])->first()){
                $user = User::where([['id',$id_user],['name',$name]])->first();
                if($user && ($user->id == Auth::User()->id)){
                    $id_datasoals = DataSoal::where('id_soal',$id)->pluck('id')->toArray();
                    $jawabans = Answer::whereIn('id_datasoal', $id_datasoals)->where('id_user',Auth::User()->id)->get();
                    return view('siswas.absensi.detail-jawaban', compact('jawabans'));
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
