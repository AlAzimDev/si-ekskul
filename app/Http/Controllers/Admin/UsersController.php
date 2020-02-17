<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataSiswa;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UsersController extends Controller
{
    public function index()
    {
        $timeNow    = Carbon::now();
        $admin      = User::where('role', 2)->orderBy('updated_at','DESC')->first();
        $operator   = User::where('role', 1)->orderBy('updated_at','DESC')->first();
        $siswa      = User::where('role', 0)->orderBy('updated_at','DESC')->first();

        if($admin == null){
            $adminUpdated = 'Tidak ditemukan adanya data';
        }else if($timeNow->diffInMinutes($admin->updated_at) < 60){
            $adminUpdated = 'Updated, beberapa menit yang lalu';
        }else if($timeNow->diffInHours($admin->updated_at) < 24){
            $adminUpdated = 'Updated, beberapa jam yang lalu';
        }else if($timeNow->diffInHours($admin->updated_at) < 7){
            $adminUpdated = 'Updated, kurang dari 7 hari yang lalu';
        }else{
            $adminUpdated = 'Updated, lebih dari 7 hari yang lalu';
        }

        if($operator == null){
            $operatorUpdated = 'Tidak ditemukan adanya data';
        }else if($timeNow->diffInMinutes($operator->updated_at) < 60){
            $operatorUpdated = 'Updated, beberapa menit yang lalu';
        }else if($timeNow->diffInHours($operator->updated_at) < 24){
            $operatorUpdated = 'Updated, beberapa jam yang lalu';
        }else if($timeNow->diffInHours($operator->updated_at) < 7){
            $operatorUpdated = 'Updated, kurang dari 7 hari yang lalu';
        }else{
            $operatorUpdated = 'Updated, lebih dari 7 hari yang lalu';
        }

        if($siswa == null){
            $siswaUpdated = 'Tidak ditemukan adanya data';
        }else if($timeNow->diffInMinutes($siswa->updated_at) < 60){
            $siswaUpdated = 'Updated, beberapa menit yang lalu';
        }else if($timeNow->diffInHours($siswa->updated_at) < 24){
            $siswaUpdated = 'Updated, beberapa jam yang lalu';
        }else if($timeNow->diffInHours($siswa->updated_at) < 7){
            $siswaUpdated = 'Updated, kurang dari 7 hari yang lalu';
        }else{
            $siswaUpdated = 'Updated, lebih dari 7 hari yang lalu';
        }
        return view('admins.users.index', compact('adminUpdated','operatorUpdated','siswaUpdated'));
    }
    public function index_admin()
    {
        return view('admins.users.admin.index');
    }
    public function data_admin(Request $request)
    {
        if ($request->ajax()) {
            $user  = User::where('role','2');
            return DataTables::of($user)
                ->addColumn('action', function($user){
                    return '<a href="/tutor/users/admin/'.$user->id.'/'.$user->name.'/edit" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a> <a data-admin="admin/'.$user->id.'/'.$user->name.'/hapus" class="btn btn-danger admin-remove" href="#" onclick="adminDelete()"><i class="fa fa-trash"></i></a>';
                })
                ->make(true);
        }
    }
    public function store_admin(Request $request)
    {
        try {
            $user               = new User();
            $user->name         = $request->get('name');
            $user->email        = $request->get('email');
            $user->password     = Hash::make($request->get('password'));
            $user->password2    = $request->get('password');
            $user->role         = 2;

            if($user->save()){
                return redirect()->back()->with('success', 'Data telah tersimpan');
            }
            return redirect()->back()->with('danger', 'Terjadi masalah dalam penginputan data, harap periksa ulang');
        } catch (Exception $e){
            return redirect()->back()->with('danger', 'Terjadi masalah dalam penginputan data, harap periksa ulang');
        }
    }
    public function edit_admin($id, $name){
        if(User::where([['id',$id],['name',$name]])->first() != null){
            $user       = User::where([['id',$id],['name',$name]])->first();
            return view('admins.users.admin.edit', compact('user'));
        }
    }
    public function update_admin(Request $request, $id, $name){
        try {
            if(User::where([['id',$id],['name',$name]])->first() != null){
                $user               = User::find($id);
                $user->name         = $request->get('name');
                $user->email        = $request->get('email');
                $user->password     = Hash::make($request->get('password'));
                $user->password2    = $request->get('password');
                $user->update();
                return redirect()->route('admin-users-admin')->with('success', 'Data berhasil diupdate');
            }
        } catch (Exception $e){
            return redirect()->route('admin-users-admin')->with('danger', 'Terjadi masalah');
        }
    }
    public function destroy_admin($id,$name){
        try {
            $user       = User::where([['id',$id],['name',$name]])->first();
            // dd($datasiswa->delete());
            $cekuser    = User::where('role',2)->first();

            if($user->id == $cekuser->id){
                return redirect()->back()->with('danger', 'Data ini merupakan data yang tidak bisa dihapus');
            }
            if($user->delete()){
                return redirect()->back()->with('success', 'Data berhasil dihapus');
            }
        } catch (Exception $e){
            return redirect()->back()->with('danger', 'Terjadi masalah dalam proses penghapusan data');
        }
    }
    public function index_operator()
    {
        return view('admins.users.operator.index');
    }
    public function data_operator(Request $request)
    {
        if ($request->ajax()) {
            $user  = User::where('role',1);
            return DataTables::of($user)
                ->addColumn('action', function($user){
                    return '<a href="/tutor/users/operator/'.$user->id.'/'.$user->name.'/edit" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a> <a href="operator/'.$user->id.'/'.$user->name.'/hapus" class="btn btn-danger" onclick="return ConfirmDelete()"><i class="fa fa-trash"></i></a>';
                })
                ->make(true);
        }
    }
    public function store_operator(Request $request)
    {
        try {
            $user               = new User();
            $user->name         = $request->get('name');
            $user->email        = $request->get('email');
            $user->password     = Hash::make($request->get('password'));
            $user->password2    = $request->get('password');
            $user->role         = 1;

            if($user->save()){
                return redirect()->back()->with('success', 'Data telah tersimpan');
            }
            return redirect()->back()->with('danger', 'Terjadi masalah dalam penginputan data, harap periksa ulang');
        } catch (Exception $e){
            return redirect()->back()->with('danger', 'Terjadi masalah dalam penginputan data, harap periksa ulang');
        }
    }
    public function edit_operator($id, $name){
        if(User::where([['id',$id],['name',$name]])->first() != null){
            $user       = User::where([['id',$id],['name',$name]])->first();
            return view('admins.users.operator.edit', compact('user'));
        }
    }
    public function update_operator(Request $request, $id, $name){
        try {
            if(User::where([['id',$id],['name',$name]])->first() != null){
                $user               = User::find($id);
                $user->name         = $request->get('name');
                $user->email        = $request->get('email');
                $user->password     = Hash::make($request->get('password'));
                $user->password2    = $request->get('password');
                $user->update();
                return redirect()->route('admin-users-operator')->with('success', 'Data berhasil diupdate');
            }
        } catch (Exception $e){
            return redirect()->route('admin-users-operator')->with('danger', 'Terjadi masalah');
        }
    }
    public function destroy_operator($id,$name){
        try {
            $user       = User::where([['id',$id],['name',$name]])->first();
            // dd($datasiswa->delete());
            if($user->delete()){
                return redirect()->back()->with('success', 'Data berhasil dihapus');
            }
        } catch (Exception $e){
            return redirect()->back()->with('danger', 'Terjadi masalah dalam proses penghapusan data');
        }
    }
    public function index_siswa()
    {
        return view('admins.users.siswa.index');
    }
    public function data_siswa(Request $request)
    {
        if ($request->ajax()) {
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
                    return '<a href="/tutor/users/siswa/'.$datasiswa->id.'/'.$datasiswa->nama_lengkap.'/edit" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a> <a href="siswa/'.$datasiswa->id.'/'.$datasiswa->nama_lengkap.'/hapus" class="btn btn-danger" onclick="return ConfirmDelete()"><i class="fa fa-trash"></i></a>';
                })
                ->make(true);
        }
    }
    public function store_siswa(Request $request)
    {
        try {
            $user               = new User();
            $user->name         = $request->get('name');
            $user->email        = $request->get('email');
            $user->password     = Hash::make($request->get('password'));
            $user->password2    = $request->get('password');
            $user->role         = 0;

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
                    return redirect()->back()->with('success', 'Data telah tersimpan');
                }else{
                    $user->delete();
                }
            }
            return redirect()->back()->with('danger', 'Terjadi masalah dalam penginputan data, harap periksa ulang');
        } catch (Exception $e){
            return redirect()->back()->with('danger', 'Terjadi masalah dalam penginputan data, harap periksa ulang');
        }
    }
    public function edit_siswa($id, $nama_lengkap){
        if(DataSiswa::where([['id',$id],['nama_lengkap',$nama_lengkap]])->first() != null){
            $datasiswa  = DataSiswa::where([['id',$id],['nama_lengkap',$nama_lengkap]])->first();
            $user       = User::find($datasiswa->id_user);
            return view('admins.users.siswa.edit', compact('datasiswa','user'));
        }
    }
    public function update_siswa(Request $request, $id, $nama_lengkap){
        try {
            if(DataSiswa::where([['id',$id],['nama_lengkap',$nama_lengkap]])->first() != null){
                $siswa                  = DataSiswa::find($id);
                $siswa->nama_lengkap    = $request->get('nama_lengkap');
                $siswa->nama_panggilan  = $request->get('nama_panggilan');
                $siswa->jenis_kelamin   = $request->get('jenis_kelamin');
                $siswa->tempat_lahir    = $request->get('tempat_lahir');
                $siswa->tanggal_lahir   = $request->get('tanggal_lahir');
                $siswa->alamat          = $request->get('alamat');
                $siswa->handphone       = $request->get('handphone');

                if($siswa->update()){
                    $user               = User::find($siswa->id_user);
                    $user->name         = $request->get('name');
                    $user->email        = $request->get('email');
                    $user->password     = Hash::make($request->get('password'));
                    $user->password2    = $request->get('password');
                    $user->update();
                    return redirect()->route('admin-users-siswa')->with('success', 'Data berhasil diupdate');
                }
                return redirect()->route('admin-users-siswa')->with('danger', 'Terjadi masalah');
            }
        } catch (Exception $e){
            return redirect()->route('admin-users-siswa')->with('danger', 'Terjadi masalah');
        }
    }
    public function destroy_siswa($id,$nama_lengkap){
        try {
            $datasiswa  = DataSiswa::where([['id',$id],['nama_lengkap',$nama_lengkap]])->first();
            $user       = User::find($datasiswa->id_user);
            // dd($datasiswa->delete());
            if($user->delete() && $datasiswa->delete()){
                return redirect()->back()->with('success', 'Data berhasil dihapus');
            }
        } catch (Exception $e){
            return redirect()->back()->with('danger', 'Terjadi masalah dalam proses penghapusan data');
        }
    }
}
