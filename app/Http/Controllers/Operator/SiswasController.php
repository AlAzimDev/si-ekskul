<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\DataSiswa;
use DataTables;
use Excel;
use App\Exports\DataSiswasExport;

class SiswasController extends Controller
{
    public function index_siswa()
    {
        return view('operators.siswa.index');
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
                ->make(true);
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
}
