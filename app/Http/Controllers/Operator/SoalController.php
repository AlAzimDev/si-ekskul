<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Soal;
use App\DataSoal;
use App\Answer;
use Alert;
use Exception;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class SoalController extends Controller
{
    public function index(){
        $soal  = Soal::orderBy('created_at','DESC')->get();
        return view('operators.soal.index', compact('soal'));
    }
    public function data(Request $request)
    {
        if ($request->ajax()) {
            $soal  = Soal::orderBy('created_at','DESC')->get();
            return DataTables::of($soal)
                ->addColumn('action', function($soal){
                    return '<a href="/operator/soal/'.$soal->id.'/'.$soal->judul_soal.'/edit" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a> 
                        <a data-admin="soal/'.$soal->id.'/'.$soal->judul_soal.'/hapus" href="#" class="btn btn-danger admin-remove" onclick="adminDelete()"><i class="fa fa-trash"></i></a> 
                        <a href="soal/'.$soal->id.'/'.$soal->judul_soal.'/data" class="btn btn-light"><i class="fa fa-cogs"></i></a>
                        <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#mediumModal'.$soal->id.'"><i class="fa fa-share"></i></a>';
                })
                ->make(true);
        }
    }
    public function store(Request $request){
        try{
            if($request->get('waktu_mulai') > $request->get('waktu_berhenti')){
                alert()->warning('Maaf','Waktu Mulai tidak boleh melebihi waktu berhenti');
                return redirect()->back();
            }
            $soal               = new Soal();
            $soal->judul_soal   = $request->get('judul_soal');
            $soal->waktu_mulai  = $request->get('waktu_mulai');
            $soal->waktu_berhenti=$request->get('waktu_berhenti');
            $soal->save();
            alert()->success('Sukses','Data berhasil disimpan');
            return redirect()->back();
        }catch(Exception $e){
            alert()->warning('Maaf','Data gagal disimpan');
            return redirect()->back();
        }
    }
    public function edit($id, $judul_soal){
        try{
            $soal = Soal::where([['id',$id],['judul_soal',$judul_soal]])->first();
            return view('operators.soal.edit', compact('soal'));
        }catch(Exception $e){
            return abort('404');
        }
    }
    public function update(Request $request, $id, $judul_soal){
        try{
            if($request->get('waktu_mulai') > $request->get('waktu_berhenti')){
                alert()->warning('Maaf','Waktu Mulai tidak boleh melebihi waktu berhenti');
                return redirect()->back();
            }
            $soal               = Soal::where([['id',$id],['judul_soal',$judul_soal]])->first();
            $soal->judul_soal   = $request->get('judul_soal');
            $soal->waktu_mulai  = $request->get('waktu_mulai');
            $soal->waktu_berhenti=$request->get('waktu_berhenti');
            $soal->update();
            alert()->success('Sukses','Data berhasil diupdate');
            return redirect()->route('admin-soal-home');
        }catch(Exception $e){
            alert()->warning('Maaf','Data gagal diupdate');
            return redirect()->back();
        }
    }
    public function destroy($id, $judul_soal){
        try{
            $soal = Soal::where([['id',$id],['judul_soal',$judul_soal]])->first();
            $datasoal = DataSoal::where('id_soal',$soal->id)->first();
            if($datasoal){
                alert()->warning('Maaf','Data belum berhasil dihapus, silahkan kosongkan soal terlebih dahulu');
                return redirect()->back();
            }
            $soal->delete();
            alert()->success('Sukses','Data berhasil dihapus');
            return redirect()->back();
        }catch(Exception $e){
            alert()->warning('Maaf','Data gagal dihapus');
            return redirect()->back();
        }
    }
    public function data_soal($id, $judul_soal){
        try{
            $soal       = Soal::where([['id',$id],['judul_soal',$judul_soal]])->first();
            $datasoal   = DataSoal::where('id_soal',$soal->id)->get();
            return view('operators.soal.data', compact('soal','datasoal'));
        }catch(Exception $e){
            return abort('404');
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
                alert()->success('Sukses','Data berhasil disimpan');
                return redirect()->back();
            }else{
                alert()->warning('Maaf','Data gagal disimpan');
                return redirect()->back();
            }
        }catch(Exception $e){
            alert()->warning('Maaf','Data gagal disimpan');
            return redirect()->back();
        }
    }
    public function data_hapus($id, $judul_soal, $id_datasoal){
        try{
            $soal   = Soal::where([['id',$id],['judul_soal',$judul_soal]])->first();
            $datasoal= DataSoal::where([['id',$id_datasoal],['id_soal',$soal->id]])->first();
            foreach(Answer::where('id_datasoal',$datasoal->id)->get() as $data){
                Answer::find($data->id)->delete();
            }
            $datasoal->delete();
            alert()->success('Sukses','Data berhasil disimpan');
            return redirect()->back();
        }catch(Exception $e){
            alert()->warning('Maaf','Data gagal dihapus');
            return redirect()->back();
        }
    }
}
