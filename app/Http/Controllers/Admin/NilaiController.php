<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Soal;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index(){
        return view('admins.nilai.index');
    }
    public function data(Request $request)
    {
        if ($request->ajax()) {
            $soal  = Soal::orderBy('created_at','DESC')->get();
            return DataTables::of($soal)->make(true);
        }
    }
}
