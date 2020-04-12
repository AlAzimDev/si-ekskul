@extends('admins.layout.header')

@section('judul-page','Nilai')
@section('button')
<a href="{{route('admin-jawaban-home')}}" class="au-btn au-btn-icon btn-warning" >
    <i class="zmdi zmdi-collection-text"></i>Jawaban</a>
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
                    <th>Nama Siswa</th>
                    <th style="text-align: right">Rata-Rata Nilai</th>
                </tr>
                </thead>
                <tbody>
                @foreach($soals as $soal)
                @php
                    $id_datasoals = App\DataSoal::where('id_soal',$soal->id)->pluck('id')->toArray();
                    $allusers = App\User::where('role',0)->whereIn('id',$id_users)->get();
                @endphp
                @foreach($allusers as $user)
                <tr onclick="window.location.href='./nilai/{{$soal->id}}/detail-nilai/{{$soal->judul_soal}}/{{$user->id}}/{{$user->name}}'">
                    <td>{{$soal->judul_soal}}</td>
                    <td>{{$user->name}}</td>
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
<script>

</script>
@endsection