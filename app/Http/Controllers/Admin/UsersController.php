<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataSiswa;
use App\User;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        return view('admins.users.index');
    }
    public function index_siswa()
    {
        return view('admins.users.siswa.index');
    }
    public function data_siswa()
    {
        $datasiswa  = DataSiswa::get();
        return DataTables::of($datasiswa)
            ->addColumn('jenis_kelamin', function($datasiswa){
                if($datasiswa->jenis_kelamin == 'll'){return "Laki-Laki";}else{return "Perempuan";};
            })
            ->addColumn('name', function($datasiswa){
                $user   = User::where('id',$datasiswa->id_user)->get();
                foreach($user as $data){return $data->name;}
            })
            ->addColumn('email', function($datasiswa){
                $user   = User::where('id',$datasiswa->id_user)->get();
                foreach($user as $data){return $data->email;}
            })
            ->addColumn('password2', function($datasiswa){
                $user   = User::where('id',$datasiswa->id_user)->get();
                foreach($user as $data){return $data->password2;}
            })
            ->addColumn('action', function($datasiswa){
                return '<a href="siswa/'.$datasiswa->id.'/'.$datasiswa->nama_lengkap.'/edit" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a> <a href="siswa/'.$datasiswa->id.'/'.$datasiswa->nama_lengkap.'/hapus" class="btn btn-danger" onclick="return ConfirmDelete()"><i class="fa fa-trash"></i></a>';
            })
            ->make(true);
    }
    public function store_siswa(Request $request)
    {
        $user               = new User();
        $user->name         = $request->get('name');
        $user->email        = $request->get('email');
        $user->password     = Hash::make($request->get('password'));
        $user->password2    = $request->get('password');

        if($user->save()){
            $siswa                  = new DataSiswa();
            $siswa->nama_lengkap    = $request->get('nama_lengkap');
            $siswa->nama_panggilan  = $request->get('nama_panggilan');
            $siswa->jenis_kelamin   = $request->get('jenis_kelamin');
            $siswa->tempat_lahir    = $request->get('tempat_lahir');
            $siswa->tanggal_lahir   = $request->get('tanggal_lahir');
            $siswa->alamat          = $request->get('alamat');
            $siswa->handphone       = $request->get('handphone');
            $siswa->id_user         = $user->id;
            if($siswa->save()){
                  
            }else{
                $user->delete();
            }
        }
        return view('admins.users.siswa.index');
    }
    public function edit_siswa($id,$nama_lengkap){
        $datasiswa  = DataSiswa::where([['id',$id],['nama_lengkap',$nama_lengkap]])->first();
        $user       = User::find($datasiswa->id_user);
        return view('admins.users.siswa.edit')->compact('datasiswa','user');
    }

    public function destroy_siswa($id,$nama_lengkap){
        $datasiswa  = DataSiswa::where([['id',$id],['nama_lengkap',$nama_lengkap]])->first();
        $user       = User::find($datasiswa->id_user);
        // dd($datasiswa->delete());
        if($user->delete() && $datasiswa->delete()){
            return redirect()->back();
        }
    }
}
