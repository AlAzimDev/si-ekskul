@extends('admins.layout.header')

@section('judul-page','Edit Data Soal')
@section('head')
<link rel="stylesheet" href="{{ asset('admin/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content')
@include('admins.layout.alert')
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="card-header col-md-12"><strong>Edit</strong> Form</div>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body card-block">
                            <form method="post" id="form1" class="form-horizontal" action="/tutor/soal/{{$soal->id.'/'.$soal->judul_soal.'/update'}}" >
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-judul-soak" class=" form-control-label">Judul Soal</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="hf-judul-soak" name="judul_soal" placeholder="Masukkan Judul Soal..." required="" class="form-control" value="{{$soal->judul_soal}}">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-waktu-mulai" class=" form-control-label">Waktu Mulai</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="datetime-local" id="hf-waktu-mulai" value="{{date('Y-m-d\TH:i', strtotime($soal->waktu_mulai))}}" name="waktu_mulai" required="" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-waktu-berhenti" class=" form-control-label">Waktu Berhenti</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="datetime-local" id="hf-waktu-berhenti" name="waktu_berhenti" required="" class="form-control" value="{{date('Y-m-d\TH:i', strtotime($soal->waktu_berhenti))}}">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button form="form1" type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Update
                </button>
                <button form="form1" type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>
    </div>
@endsection