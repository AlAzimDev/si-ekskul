<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Soal;
use App\DataSoal;
use Exception;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class SoalController extends Controller
{
    public function index(){
        return view('admins.soal.index');
    }
    public function data(Request $request)
    {
        if ($request->ajax()) {
            $soal  = Soal::orderBy('created_at','DESC')->get();
            return DataTables::of($soal)
                ->addColumn('action', function($soal){
                    return '<a href="/tutor/soal/'.$soal->id.'/'.$soal->judul_soal.'/edit" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a> 
                        <a href="soal/'.$soal->id.'/'.$soal->judul_soal.'/hapus" class="btn btn-danger" onclick="return ConfirmDelete()"><i class="fa fa-trash"></i></a> 
                        <a href="soal/'.$soal->id.'/'.$soal->judul_soal.'/data" class="btn btn-light"><i class="fa fa-cogs"></i></a>';
                })
                ->make(true);
        }
    }
    public function store(Request $request){
        try{
            $soal               = new Soal();
            $soal->judul_soal   = $request->get('judul_soal');
            $soal->waktu_mulai  = $request->get('waktu_mulai');
            $soal->waktu_berhenti=$request->get('waktu_berhenti');
            $soal->save();
            return redirect()->back()->with('success', 'Data telah tersimpan');
        }catch(Exception $e){
            return redirect()->back()->with('danger', 'Data gagal disimpan');
        }
    }
    public function edit($id, $judul_soal){
        try{
            $soal = Soal::where([['id',$id],['judul_soal',$judul_soal]])->first();
            return view('admins.soal.edit', compact('soal'));
        }catch(Exception $e){

        }
    }
    public function update(Request $request, $id, $judul_soal){
        try{
            $soal               = Soal::where([['id',$id],['judul_soal',$judul_soal]])->first();
            $soal->judul_soal   = $request->get('judul_soal');
            $soal->waktu_mulai  = $request->get('waktu_mulai');
            $soal->waktu_berhenti=$request->get('waktu_berhenti');
            $soal->update();
            return redirect()->route('admin-soal-home')->with('success','Data telah diperbaharui');
        }catch(Exception $e){
            return redirect()->route('admin-soal-home')->with('danger','Data gagal diperbaharui');
        }
    }
    public function destroy($id, $judul_soal){
        try{
            $soal               = Soal::where([['id',$id],['judul_soal',$judul_soal]])->first();
            $soal->delete();
            return redirect()->route('admin-soal-home')->with('success','Data telah dihapus');
        }catch(Exception $e){
            return redirect()->route('admin-soal-home')->with('danger','Data gagal dihapus');
        }
    }
    public function data_soal($id, $judul_soal){
        try{
            $soal       = Soal::where([['id',$id],['judul_soal',$judul_soal]])->first();
            $datasoal   = DataSoal::where('id_soal',$soal->id)->get();
            return view('admins.soal.data', compact('soal','datasoal'));
        }catch(Exception $e){
            // return redirect()->route('admin-soal-home')->with('danger','Data gagal dihapus');
            // diubah menjadi link 404 not found
        }
    }
    public function data_store(Request $request, $id, $judul_soal){
        try{
            $soal   = Soal::where([['id',$id],['judul_soal',$judul_soal]])->first();
            if(count($request->soal) > 0 && $soal != null){
                foreach($request->soal as $item=>$v){
                    $datasoal       = new DataSoal();
                    $datasoal->soal = $request->soal[$item];
                    $datasoal->id_soal = $soal->id;
                    $datasoal->save();
                }
                return redirect()->back()->with('success','Data berhasil disimpan');
            }else{
                return redirect()->back()->with('danger','Data gagal disimpan');
            }
        }catch(Exception $e){
            return redirect()->back()->with('danger','Data gagal disimpan');
        }
    }
    public function data_hapus($id, $judul_soal, $id_datasoal, $soal){
        try{
            $soal   = Soal::where([['id',$id],['judul_soal',$judul_soal]])->first();
            $datasoal= DataSoal::where([['id',$id_datasoal],['id_soal',$soal->id]],[['soal',$soal]])->first();
            $datasoal->delete();
            return redirect()->back()->with('success','Data berhasil dihapus');
        }catch(Exception $e){
            return redirect()->back()->with('danger','Data gagal dihapus');
        }
    }
}
