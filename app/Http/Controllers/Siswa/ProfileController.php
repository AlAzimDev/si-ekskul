<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataSiswa;
use App\User;
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
}
