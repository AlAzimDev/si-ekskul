<?php

namespace App\Http\Middleware;

use App\User;
use App\Soal;
use Auth;
use Closure;
use Illuminate\Support\Str;

class CheckStatusSoal
{
    public function handle($request, Closure $next)
    {
        $data   = User::find(Auth::User()->id);
        if($data->data_siswa->id_soal != null){
            $soal   = Soal::find($data->data_siswa->id_soal);
            if($soal){
                alert()->info('Selesaikan latihan ini terlebih dahulu!','');
                return redirect('siswa/'.$soal->id.'/soal/'.Str::slug($soal->judul_soal.$soal->id, "%20"));
            }
            alert()->warning('Soal tidak ditemukan!','');
        }
        return $next($request);
    }
}
