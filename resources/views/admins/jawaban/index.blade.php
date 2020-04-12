@extends('admins.layout.header')

@section('judul-page','Pilih Mata Pelajaran')
@section('content')
<br/>
@include('admins.layout.alert')
<div class="row">
    <div class="col-lg-12">
        @foreach($soals as $soal)
        <div class="email__item" style="cursor: pointer" onclick="window.location.href='./jawaban/{{$soal->id}}/user/{{$soal->judul_soal}}'">
            <div class="content">
                <h4>{{$soal->judul_soal}}</h4>
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