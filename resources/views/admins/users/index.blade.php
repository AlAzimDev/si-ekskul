@extends('admins.layout.header')

@section('judul-page','Data User')

@section('content')
<div class="email__item" style="cursor: pointer" onclick="window.location.href='{{route('admin-home')}}'">
    <div class="image img-cir img-40">
        <img src="{{asset('admin/images/icon/avatar-06.jpg')}}" alt="Cynthia Harvey" />
    </div>
    <div class="content">
        <p>Data Admin</p>
        <span>Updated, 3 min ago</span>
    </div>
</div>
<div class="email__item" style="cursor: pointer" onclick="window.location.href='{{route('admin-home')}}'">
    <div class="image img-cir img-40">
        <img src="{{asset('admin/images/icon/avatar-06.jpg')}}" alt="Updated" />
    </div>
    <div class="content">
        <p>Data Petugas</p>
        <span>Updated, 3 min ago</span>
    </div>
</div>
<div class="email__item" style="cursor: pointer" onclick="window.location.href='{{route('admin-users-siswa')}}'">
    <div class="image img-cir img-40">
        <img src="{{asset('admin/images/icon/avatar-06.jpg')}}" alt="Updated" />
    </div>
    <div class="content">
        <p>Data Siswa</p>
        <span>Updated, 3 min ago</span>
    </div>
</div>
@endsection