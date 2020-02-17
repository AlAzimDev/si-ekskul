@extends('siswas.layout.header')

@section('judul-page','Absensi & Daftar Nilai')

@section('content')
<div class="row">
    <div class="col-sm-12 col-lg-12">
        <div class="overview-item overview-item--c3">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-calendar-note"></i>
                    </div>
                    <div class="text">
                        <h2>{{number_format($c_absen)}}</h2>
                        <span>Anda telah mengikuti {{number_format($c_absen)}} kali pertemuan di ekstrakulikuler ACC</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection