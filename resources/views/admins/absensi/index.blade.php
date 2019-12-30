@extends('admins.layout.header')

@section('judul-page','Data Absensi')
@section('button')
<button type="button" class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#mediumModal">
    <i class="zmdi zmdi-plus"></i>add data</button>
@endsection
@section('modal')
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="card-header col-md-11"><strong>Data</strong> Form</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body card-block">
                            <form method="post" id="form1" class="form-horizontal" action="{{route('admin-absensi-store')}}/" >
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-materi-pembelajaran" class=" form-control-label">Materi Pembelajaran</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="hf-materi-pembelajaran" name="materi_pembelajaran" placeholder="Masukkan Materi Pembelajaran..." required="" class="form-control">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button form="form1" type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
                <button form="form1" type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="mediumModalShareAbsen" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p>Share Absensi</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body card-block">
                            <div class="col col-md-12" align="center">
                                <p>Note: Ketuk Code QR untuk men-download gambar</p>
                                <a target="_blank" href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(1000)->generate(URL::to('/'.$url))) !!} "  download="Absensi @if($lastabsensi != null){{$lastabsensi->created_at}}@endif">
                                    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate(URL::to('/'.$url))) !!} " class="center">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<br/>
@include('admins.layout.alert')
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-borderless table-striped table-earning" id="example">
                <thead>
                <tr>
                    <th>Materi Pembelajaran</th>
                    <th style="text-align: right">Action</th>
                </tr>
                </thead>
                <tbody>
                <p id="demo1">Absensi berlaku <span id="demo"></span> lagi</p>
                @foreach($absensi as $data)
                <tr>
                    <td onclick="window.location.href='absensi/detail/{{$data->id}}/{{$data->materi_pembelajaran}}/detail'">{{$data->materi_pembelajaran}}</td>
                    <td class="float-right">
                        @if($lastabsensi != null)
                        @if($data->id == $lastabsensi->id)
                        <button class="btn btn-primary" data-toggle="modal" data-target="#mediumModalShareAbsen" id="tombolShare"><i class="fa fa-share"></i> Share</button>
                        @endif
                        @endif
                        <a href="absensi/{{$data->id}}/{{$data->materi_pembelajaran}}/hapus" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
@if($lastabsensi != null)
var countDownDate = new Date('{{$lastabsensi->created_at}}').getTime() + (1*60*60*1000);
var x = setInterval(function() {
    var now = new Date().getTime();
    var distance =  countDownDate-now;
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    document.getElementById("demo").innerHTML = minutes + " menit " + seconds + " detik";
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo1").innerHTML = "Absensi sudah ditutup";
        document.getElementById("tombolShare").disabled = true;
        document.getElementById("tombolShare").className += " disabled";
    }
}, 1000);
@else
document.getElementById("demo1").innerHTML = "Tidak ditemukannya data Absensi";
@endif
</script>
@endsection