@extends('admins.layout.header')

@section('judul-page','Data Pengguna')

@section('content')
<div class="email__item" style="cursor: pointer" onclick="window.location.href='{{route('admin-users-admin')}}'">
    <div class="content">
        <h4>Data Admin</h4>
        <span>{{$adminUpdated}}</span>
    </div>
</div>
<div class="email__item" style="cursor: pointer" onclick="window.location.href='{{route('admin-users-operator')}}'">
    <div class="content">
        <h4>Data Petugas</h4>
        <span>{{$operatorUpdated}}</span>
    </div>
</div>
<div class="email__item" style="cursor: pointer" onclick="window.location.href='{{route('admin-users-siswa')}}'">
    <div class="content">
        <h4>Data Siswa</h4>
        <span>{{$siswaUpdated}}</span>
    </div>
</div>
@endsection