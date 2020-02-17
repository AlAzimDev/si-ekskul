@extends('siswas.layout.header')

@section('judul-page','Your Profile')

@section('content')
<br/>
<div class="col-md-12">
    <div class="card">
        <div class="card-body card-block">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-5">
                        <label class=" form-control-label">Nama Lengkap</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <p class="form-control-static">{{$data->nama_lengkap}}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-5">
                        <label class=" form-control-label">Nama Panggilan</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <p class="form-control-static">{{$data->nama_panggilan}}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-5">
                        <label class=" form-control-label">Jenis Kelamin</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <p class="form-control-static">{{$data->jenis_kelamin}}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-5">
                        <label class=" form-control-label">Tempat, Tanggal Lahir</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <p class="form-control-static">{{$data->tempat_lahir}}, {{date('d M Y', strtotime($data->tanggal_lahir))}}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-5">
                        <label class=" form-control-label">Alamat</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <p class="form-control-static">{{$data->alamat}}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-5">
                        <label class=" form-control-label">Email</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <p class="form-control-static">{{Auth::User()->email}}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-5">
                        <label class=" form-control-label">Nomor Handphone</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <p class="form-control-static">{{substr($data->handphone, 0, 4)."-".substr($data->handphone, 4, 4)."-".substr($data->handphone,8)}}</p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection