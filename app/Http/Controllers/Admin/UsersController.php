<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Alert;
use Auth;
use App\Answer;
use App\DataAbsen;
use App\DataSiswa;
use App\Exports\DataSiswasExport;
use App\Imports\DataSiswasImport;
use App\Imports\UsersImport;
use App\User;
use Carbon\Carbon;
use Exception;
use Excel;
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
            if(Auth::User()->id == 1){
                $user  = User::where([['role','2']]);
            }else{
                $user  = User::where([['role','2'],['id','!=',Auth::User()->id]]);
            }
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
                alert()->success('Sukses','Data sukses disimpan');
                return redirect()->back();
            }
            alert()->warning('Maaf','Terjadi masalah dalam penginputan data, harap periksa ulang');
            return redirect()->back();
        } catch (Exception $e){
            dd($e);
            alert()->warning('Maaf','Terjadi masalah dalam penginputan data, harap periksa ulang');
            return redirect()->back();
        }
    }
    public function edit_admin($id, $name){
        try {
            if(User::where([['id',$id],['name',$name]])->first() != null){
                $user       = User::where([['id',$id],['name',$name]])->first();
                return view('admins.users.admin.edit', compact('user'));
            }else{
                return abort('404');
            }
        } catch (\Throwable $th) {
            return abort('404');
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
                alert()->success('Sukses','Data berhasil diupdate');
                return redirect()->route('admin-users-admin');
            }
        } catch (Exception $e){
            alert()->warning('Maaf','Terjadi masalah');
            return redirect()->route('admin-users-admin');
        }
    }
    public function destroy_admin($id,$name){
        try {
            $user       = User::where([['id',$id],['name',$name]])->first();
            // dd($datasiswa->delete());
            $cekuser    = User::where('role',2)->first();

            if($user->id == 1){
                alert()->warning('Maaf','Data ini merupakan data yang tidak bisa dihapus');
                return redirect()->back();
            }
            $user->delete();
            alert()->success('Sukses','Data berhasil dihapus');
            return redirect()->back();
        } catch (Exception $e){
            alert()->warning('Maaf','Data gagal dihapus');
            return redirect()->back();
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
                    return '<a href="/tutor/users/operator/'.$user->id.'/'.$user->name.'/edit" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a> <a data-admin="operator/'.$user->id.'/'.$user->name.'/hapus" href="#" class="btn btn-danger admin-remove" onclick="adminDelete()"><i class="fa fa-trash"></i></a>';
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
                alert()->success('Sukses','Data berhasil disimpan');
                return redirect()->back();
            }
            alert()->warning('Maaf','Data gagal disimpan');
            return redirect()->back();
        } catch (Exception $e){
            alert()->warning('Maaf','Data gagal disimpan');
            return redirect()->back();
        }
    }
    public function edit_operator($id, $name){
        if(User::where([['id',$id],['name',$name]])->first() != null){
            $user       = User::where([['id',$id],['name',$name]])->first();
            return view('admins.users.operator.edit', compact('user'));
        }else{
            return abort('404');
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
                alert()->success('Sukses','Data berhasil diupdate');
                return redirect()->route('admin-users-operator');
            }
            alert()->warning('Maaf','Data gagal diupdate');
            return redirect()->route('admin-users-operator');
        } catch (Exception $e){
            alert()->warning('Maaf','Data gagal diupdate');
            return redirect()->route('admin-users-operator');
        }
    }
    public function destroy_operator($id,$name){
        try {
            $user       = User::where([['id',$id],['name',$name]])->first();
            // dd($datasiswa->delete());
            if($user->delete()){
                alert()->success('Sukses','Data berhasil dihapus');
                return redirect()->back();
            }
        } catch (Exception $e){
            alert()->warning('Maaf','Data gagal dihapus');
            return redirect()->back();
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
                ->addColumn('email', function($datasiswa){
                    $user   = User::where('id',$datasiswa->id_user)->get();
                    foreach($user as $data){return $data->email;}
                })
                ->addColumn('password2', function($datasiswa){
                    $user   = User::where('id',$datasiswa->id_user)->get();
                    foreach($user as $data){return $data->password2;}
                })
                ->addColumn('tempattanggal_lahir', function($datasiswa){
                    return $datasiswa->tempat_lahir.', '.date('d M Y', strtotime($datasiswa->tanggal_lahir));
                })
                ->addColumn('handphone', function($datasiswa){
                    return substr($datasiswa->handphone, 0, 4)."-".substr($datasiswa->handphone, 4, 4)."-".substr($datasiswa->handphone,8);
                })
                ->addColumn('action', function($datasiswa){
                    return '<a href="/tutor/users/siswa/'.$datasiswa->id.'/'.$datasiswa->nama_lengkap.'/edit" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a> <a data-admin="siswa/'.$datasiswa->id.'/'.$datasiswa->nama_lengkap.'/hapus" href="#" class="btn btn-danger admin-remove" onclick="adminDelete()"><i class="fa fa-trash"></i></a>';
                })
                ->make(true);
        }
    }
    public function store_siswa(Request $request)
    {
        try {
            $user               = new User();
            $user->name         = $request->get('nama_panggilan');
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
                    alert()->success('Sukses','Data berhasil disimpan');
                    return redirect()->back();
                }else{
                    $user->delete();
                }
            }
            alert()->warning('Maaf','Data gagal disimpan');
            return redirect()->back();
        } catch (Exception $e){
            alert()->warning('Maaf','Data gagal disimpan');
            return redirect()->back();
        }
    }
    public function edit_siswa($id, $nama_lengkap){
        if(DataSiswa::where([['id',$id],['nama_lengkap',$nama_lengkap]])->first() != null){
            $datasiswa  = DataSiswa::where([['id',$id],['nama_lengkap',$nama_lengkap]])->first();
            $user       = User::find($datasiswa->id_user);
            return view('admins.users.siswa.edit', compact('datasiswa','user'));
        }else{
            return abort('404');
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
                    $user->name         = $request->get('nama_panggilan');
                    $user->email        = $request->get('email');
                    $user->password     = Hash::make($request->get('password'));
                    $user->password2    = $request->get('password');
                    $user->update();
                    alert()->success('Sukses','Data berhasil disimpan');
                    return redirect()->route('admin-users-siswa');
                }
                alert()->warning('Maaf','Data gagal diupdate');
                return redirect()->route('admin-users-siswa');
            }
        } catch (Exception $e){
            alert()->warning('Maaf','Data gagal diupdate');
            return redirect()->route('admin-users-siswa');
        }
    }
    public function destroy_siswa($id,$nama_lengkap){
        try {
            $datasiswa  = DataSiswa::where([['id',$id],['nama_lengkap',$nama_lengkap]])->first();
            $user       = User::find($datasiswa->id_user);
            // dd($datasiswa->delete());
            if($user->delete() && $datasiswa->delete()){
                foreach(Answer::where('id_user',$datasiswa->id_user)->pluck('id')->toArray() as $data){
                    Answer::find($data)->delete();
                }
                foreach(DataAbsen::where('id_user',$datasiswa->id_user)->pluck('id')->toArray() as $data){
                    DataAbsen::find($data)->delete();
                }
                alert()->success('Sukses','Data berhasil dihapus');
                return redirect()->back();
            }
        } catch (Exception $e){
            alert()->warning('Maaf','Data gagal dihapus');
            return redirect()->back();
        }
    }

    //Export
    public function download_datasiswa(Request $request){
        try {
            if($request->get('format_waktu') == 'jam'){
                $waktu = $request->get('waktu') * 1;
            }else if($request->get('format_waktu') == 'hari'){
                $waktu = $request->get('waktu') * 24;
            }else if($request->get('format_waktu') == 'minggu'){
                $waktu = $request->get('waktu') * (24*7);
            }else if($request->get('format_waktu') == 'bulan'){
                $waktu = $request->get('waktu') * (24*30);
            }else{
                $waktu = $request->get('waktu') * (24*365);
            }
            // dd($waktu);
            return Excel::download(new DataSiswasExport($request->get('format_waktu'),$request->get('mode'),$waktu), 'DataSiswa.'.$request->get('extension'));
        } catch (Exception $e){
            alert()->warning('Maaf','Data gagal didownload');
            return redirect()->back();
        }
    }

    //Import
    public function import(Request $request){
        try {
            $request->validate([
                'import_file' => 'required|mimes:xlsx,xls,csv'
            ]);
            Excel::import(new UsersImport, $request->file('import_file'));
            // dd(User::where('email', 'raihanhisbullah030@gmail.com')->pluck('id')->first());
            Excel::import(new DataSiswasImport, $request->file('import_file'));
            alert()->success('Sukses','Data berhasil diimport');
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->warning('Maaf','Data gagal diimport');
            return redirect()->back();
        }
    }
}
