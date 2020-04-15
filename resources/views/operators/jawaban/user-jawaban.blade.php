@extends('operators.layout.header')

@section('judul-page','Pemeriksaaan Jawaban Siswa - Mata Pelajaran '.$judul_soal)
@section('content')
<br/>
@include('operators.layout.alert')
<div class="row">
    <div class="col-lg-12">
        @foreach($users as $user)
        <div class="email__item" style="cursor: pointer" onclick="window.location.href='../../../jawaban/{{$id}}/user/{{$judul_soal}}/{{$user->id}}/{{$user->name}}/periksa-jawaban'">
            <div class="content">
                <h4>{{$user->name}}</h4>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
@section('script')
<script>

</script>
@endsection