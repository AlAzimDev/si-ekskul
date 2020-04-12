<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Absensi;
use App\DataAbsen;
use App\Exports\DataAbsensExport;
use DataTables;
use Exception;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use URL;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi    = Absensi::orderBy('created_at','DESC')->get();
        $lastabsensi= $absensi->first();
        if($lastabsensi){
            $url        = 'siswa/absensi/materi-pembelajaran/'.$lastabsensi->id.'/'.Str::slug($lastabsensi->materi_pembelajaran, "%20").$lastabsensi->id;
        }else{
            $url = '';
        }
        return view('admins.absensi.index', compact('absensi','lastabsensi','url'));
    }
    public function store(Request $request)
    {
        try {
            $absensi                        = new Absensi();
            $absensi->materi_pembelajaran   = $request->get('materi_pembelajaran');
            if($absensi->save()){
                alert()->success('Sukses','Data telah tersimpan, Absensi akan ditutup dalam 60 menit kedepan');
                return redirect()->back();
            }
            alert()->warning('Maaf','Terjadi masalah dalam penginputan data, harap periksa ulang');
            return redirect()->back();
        } catch (Exception $e){
            alert()->warning('Maaf','Terjadi masalah dalam penginputan data, harap periksa ulang');
            return redirect()->back();
        }
    }
    public function destroy($id,$materi_pembelajaran){
        try {
            $absensi    = Absensi::where([['id',$id],['materi_pembelajaran',$materi_pembelajaran]])->first();
            $absensi->delete();
            foreach(DataAbsen::where('id_absen',$absensi->id)->pluck('id')->toArray() as $data){
                DataAbsen::find($data)->delete();
            }
            alert()->success('Sukses','Data berhasil dihapus');
            return redirect()->back();
        } catch (Exception $e){
            alert()->warning('Maaf','Data gagal dihapus');
            return redirect()->back();
        }
    }
    public function detail($id,$materi_pembelajaran){
        try {
            $absensi    = Absensi::where([['id',$id],['materi_pembelajaran',$materi_pembelajaran]])->first();
            $dataabsen  = $absensi->dataabsen;
            // dd($dataabsen);
            return view('admins.absensi.detail-absensi', compact('dataabsen','id','materi_pembelajaran'));
        } catch (Exception $e){
            return abort('404');
        }
    }
    public function data_detail(Request $request, $id,$materi_pembelajaran){
        if ($request->ajax()) {
            $absensi    = Absensi::where([['id',$id],['materi_pembelajaran',$materi_pembelajaran]])->first();
            $dataabsen  = $absensi->dataabsen;
            // dd($dataabsen);
            return DataTables::of($dataabsen)
                ->addColumn('nama_user', function($dataabsen){
                    return $dataabsen->user->name;
                })->make(true);
        }
    }
    //Export
    public function download_dataabsen(Request $request){
        try {
            $data = [];
            $waktu = 0;
            if($request->get('filter') == 'waktu'){
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
            }else{
                foreach($request->get('data') as $databaru){
                    $data[] = $databaru;
                }
            }
            return Excel::download(new DataAbsensExport($request->get('format_waktu'),$data,$waktu,$request->get('filter')), 'DataSiswa.'.$request->get('extension'));
        } catch (Exception $e){
            alert()->warning('Maaf','Data gagal didownload');
            return redirect()->back();
        }
    }
}
