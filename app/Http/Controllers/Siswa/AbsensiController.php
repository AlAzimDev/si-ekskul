<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Absensi;
use App\DataAbsen;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use Alert;

class AbsensiController extends Controller
{
    public function index(){
        $d_absen    = DataAbsen::where('id_user',Auth::User()->id)->get();
        $c_absen    = count($d_absen);
        return view('siswas.absensi.index', compact('c_absen'));
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
}
