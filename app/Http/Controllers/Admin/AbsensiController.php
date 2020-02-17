<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Absensi;
use App\DataAbsensi;
use DataTables;
use Exception;
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
                return redirect()->back()->with('success', 'Data telah tersimpan, Absensi akan ditutup dalam 60 menit kedepan');
            }
            return redirect()->back()->with('danger', 'Terjadi masalah dalam penginputan data, harap periksa ulang');
        } catch (Exception $e){
            return redirect()->back()->with('danger', 'Terjadi masalah dalam penginputan data, harap periksa ulang');
        }
    }
    public function destroy($id,$materi_pembelajaran){
        try {
            $absensi    = Absensi::where([['id',$id],['materi_pembelajaran',$materi_pembelajaran]])->first();
            $absensi->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (Exception $e){
            return redirect()->back()->with('danger', 'Terjadi masalah dalam proses penghapusan data');
        }
    }
    public function detail($id,$materi_pembelajaran){
        // try {
            $absensi    = Absensi::where([['id',$id],['materi_pembelajaran',$materi_pembelajaran]])->first();
            $dataabsen  = $absensi->dataabsen;
            // dd($dataabsen);
            return view('admins.absensi.detail-absensi', compact('dataabsen','id','materi_pembelajaran'));
        // } catch (Exception $e){
        //     return redirect()->back();
        // }
    }
    public function data_detail(Request $request, $id,$materi_pembelajaran){
        if ($request->ajax()) {
            $absensi    = Absensi::where([['id',$id],['materi_pembelajaran',$materi_pembelajaran]])->first();
            $dataabsen  = $absensi->dataabsen;
            // dd($dataabsen);
            return DataTables::of($dataabsen)->make(true);
        }
    }
}
