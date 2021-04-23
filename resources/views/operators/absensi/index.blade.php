@extends('operators.layout.header')

@section('judul-page','Data Absensi')
@section('button')
<button type="button" class="au-btn au-btn-icon au-btn--green" data-toggle="modal" data-target="#mediumModal1">
    <i class="zmdi zmdi-download"></i>export data absensi</button>
<button type="button" class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#mediumModal">
    <i class="zmdi zmdi-plus"></i>tambahkan data</button>
@endsection
@section('head')
<link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
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
                            <form method="post" id="form1" class="form-horizontal" action="{{route('operator-absensi-store')}}/" >
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
                <p>Bagikan Absensi</p>
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
                                @if($lastabsensi != null)
                                <a id="tolink" target="_blank" href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(1000)->generate(URL::to('/'.$url))) !!} "  download="Absensi Ampang Coding Class" hidden="true">
                                    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate(URL::to('/'.$url))) !!} " class="center">
                                </a>
                                @endif
                            </div>
                            <div class="col col-md-12" align="center">
                                @if($lastabsensi != null)
                                <input type="text" class="form-control col-md-9" id="myInput" value="{{URL::to('/'.$url)}}" readonly>
                                @endif
                            </div>
                            <div class="col col-md-12" align="center">
                                <button class="btn btn-primary col-md-3" onclick="copyFunction()">Salin</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="mediumModal1" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="card-header col-md-11"><strong>Export Data Absensi</strong> Form</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body card-block">
                            <form method="post" id="form2" class="form-horizontal" action="{{route('operator-absensi-download')}}" >
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-email" class=" form-control-label">Berdasarkan</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="filter" id="filter" onchange="filterBaru()" class="form-control-lg form-control">
                                            <option value="waktu">Waktu</option>
                                            <option value="data_absen">Data Absensi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-email" id="nama_label" class=" form-control-label">Waktu</label>
                                    </div>
                                    <div class="col-12 col-md-3" id="waktu" style="display: none">
                                        <input type="number" name="waktu" min ="1" max="100" class="form-control">
                                    </div>
                                    <div class="col-12 col-md-9" id="rangkap_waktu">
                                        <select name="format_waktu" id="format_waktu" onchange="formatWaktu()" class="form-control-lg form-control">
                                            <option value="semua_waktu">Semua Waktu</option>
                                            <option value="hari_ini">Hari Ini</option>
                                            <option value="bulan_ini">Bulan Ini</option>
                                            <option value="tahun_ini">Tahun Ini</option>
                                            <option value="jam">Jam Terakhir</option>
                                            <option value="hari">Hari Terakhir</option>
                                            <option value="minggu">Minggu Terakhir</option>
                                            <option value="bulan">Bulan Terakhir</option>
                                            <option value="tahun">Tahun Terakhir</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-9" id="data_absensi" style="display: none">
                                        <select name="data[]" multiple="" class="form-control-lg form-control">
                                            @foreach($absensi as $data)
                                            <option value="{{$data->id}}">{{$data->materi_pembelajaran}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-email" class=" form-control-label">Extension</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="extension" class="form-control-lg form-control">
                                            <option value="xlsx">.XLSX</option>
                                            <option value="xls">.XLS</option>
                                            <option value="csv">.CSV</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button form="form2" type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Export
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<br/>
@include('operators.layout.alert')
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-borderless table-striped table-earning" id="example">
                <thead>
                <tr>
                    <th>Materi Pembelajaran</th>
                    <th style="text-align: right">Tindakan</th>
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
                        <button class="btn btn-primary" data-toggle="modal" data-target="#mediumModalShareAbsen" id="tombolShare"><i class="fa fa-share"></i> Bagikan</button>
                        @endif
                        @endif
                        <a data-admin="absensi/{{$data->id}}/{{$data->materi_pembelajaran}}/hapus" href="#" class="btn btn-danger admin-remove" onclick="adminDelete()"><i class="fa fa-trash"></i> Hapus</a>
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
    }else{
        document.getElementById("tolink").hidden = false;
    }
}, 1000);
@else
document.getElementById("demo1").innerHTML = "Tidak ditemukannya data Absensi";
@endif
    function copyFunction(){
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
    }
    function adminDelete() {
        var postId = $(event.currentTarget).data('admin');
        swal({
            title: "yakin untuk menghapus data ini?",
            type: "info",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger waves-effect waves-light',
            confirmButtonText: "Hapus",
            cancelButtonText: "Tidak",
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(){
            window.location.href = postId;
        });
    }
    function formatWaktu(){
        var x = document.getElementById('format_waktu');
        console.log(x.value);
        if (x.value == "semua_waktu") {
            document.getElementById('waktu').style.display = "none";
            document.getElementById('format_waktu').parentElement.className = 'col-12 col-md-9';
        } else if (x.value == "hari_ini") {
            document.getElementById('waktu').style.display = "none";
            document.getElementById('format_waktu').parentElement.className = 'col-12 col-md-9';
        } else if (x.value == "bulan_ini") {
            document.getElementById('waktu').style.display = "none";
            document.getElementById('format_waktu').parentElement.className = 'col-12 col-md-9';
        } else if (x.value == "tahun_ini") {
            document.getElementById('waktu').style.display = "none";
            document.getElementById('format_waktu').parentElement.className = 'col-12 col-md-9';
        } else {
            document.getElementById('waktu').style.display = "block";
            document.getElementById('format_waktu').parentElement.className = 'col-12 col-md-6';
        }
    }
    function filterBaru(){
        var x = document.getElementById('filter');
        if (x.value == "waktu") {
            document.getElementById('rangkap_waktu').style.display = "block";
            document.getElementById('data_absensi').style.display = "none";
            document.getElementById('nama_label').innerHTML = "Waktu";
        } else {
            document.getElementById('waktu').style.display = "none";
            document.getElementById('rangkap_waktu').style.display = "none";
            document.getElementById('data_absensi').style.display = "block";
            document.getElementById('nama_label').innerHTML = "Data Absensi";
        }
    }
</script>
@endsection