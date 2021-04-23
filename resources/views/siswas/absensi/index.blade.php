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
                        <span>Anda telah mengikuti {{number_format($c_absen)}} kali pertemuan di ekstrakulikuler</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-borderless table-striped table-earning" id="example">
                <thead>
                <tr>
                    <th>Materi Pembelajaran</th>
                    <th style="text-align: right">Nilai</th>
                </tr>
                </thead>
                <tbody>
                @foreach($soals as $soal)
                @php
                    $id_datasoals = App\DataSoal::where('id_soal',$soal->id)->pluck('id')->toArray();
                    $id_users = App\Answer::whereIn('id_datasoal',$id_datasoals)->where('id_user',Auth::User()->id)->pluck('id_user')->toArray();
                @endphp
                @foreach($users as $user)
                <tr onclick="window.location.href='./absensi-nilai/{{$soal->id}}/detail-nilai/{{$soal->judul_soal}}/{{$user->id}}/{{$user->name}}'">
                    <td>{{$soal->judul_soal}}</td>
                    <td style="text-align: right">{!!number_format(App\Answer::whereIn('id_datasoal',$id_datasoals)->where('id_user', $user->id)->avg('persentasi'),2)!!}</td>
                </tr>
                @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('admin/vendor/jquery-3.2.1.min.js')}}"></script>
@endsection