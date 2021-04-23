@extends('admins.layout.header')

@section('judul-page','Detail Nilai '.$judul_soal)
@section('content')
<br/>
@include('admins.layout.alert')
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-borderless table-striped table-earning" id="example">
                <thead>
                <tr>
                    <th>Nama Siswa</th>
                    <th>Email</th>
                    <th style="text-align: right">Nilai</th>
                </tr>
                </thead>
                <tbody>
                @foreach($allusers as $user)
                <tr onclick="window.location.href='./{{$judul_soal}}/{{$user->id}}/{{$user->name}}'">
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td style="text-align: right">{!!number_format(App\Answer::whereIn('id_datasoal',$id_datasoals)->where('id_user', $user->id)->avg('persentasi'),2)!!}</td>
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

</script>
@endsection