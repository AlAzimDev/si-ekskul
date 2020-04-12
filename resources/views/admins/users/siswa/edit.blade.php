@extends('admins.layout.header')

@section('judul-page','Edit Data Siswa')
@section('head')
<link rel="stylesheet" href="{{ asset('admin/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content')
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="card-header col-md-12"><strong>Edit</strong> Form</div>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body card-block">
                            <form method="post" id="form1" class="form-horizontal" action="/tutor/users/siswa/{{$datasiswa->id.'/'.$datasiswa->nama_lengkap.'/update'}}" >
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-email" class=" form-control-label">Email</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="email" id="hf-email" name="email" value="{{$user->email}}" placeholder="Masukkan Email..." required="" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-password" class=" form-control-label">Password</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="password" id="hf-password" name="password" value="{{$user->password2}}" placeholder="Masukkan Password..." required="" class="form-control">
                                        <input type="checkbox" onclick="showHide()"> Show Password
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-nama-lengkap" class=" form-control-label">Nama Lengkap</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="hf-nama-lengkap" name="nama_lengkap" value="{{$datasiswa->nama_lengkap}}" placeholder="Masukkan Nama Lengkap..." required="" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-nama-panggilan" class=" form-control-label">Nama Panggilan</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="hf-nama-panggilan" name="nama_panggilan" value="{{$datasiswa->nama_panggilan}}" placeholder="Masukkan Nama Panggilan..." required="" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-jenis-kelamin" class=" form-control-label">Jenis Kelamin</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select id="hf-jenis-kelamin" name="jenis_kelamin" required="" class="form-control">
                                            <option value="ll" {{$datasiswa->jenis_kelamin == 'll' ? 'selected':''}}>Laki-Laki</option>
                                            <option value="p" {{$datasiswa->jenis_kelamin == 'p' ? 'selected':''}}>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-tempat-lahir" class=" form-control-label">Tempat Lahir</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="hf-tempat-lahir" name="tempat_lahir" value="{{$datasiswa->tempat_lahir}}" placeholder="Masukkan Tempat Lahir..." class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-tanggal-lahir" class=" form-control-label">Tanggal Lahir</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" id="hf-tanggal-lahir" name="tanggal_lahir" value="{{$datasiswa->tanggal_lahir}}" placeholder="Masukkan Tanggal Lahir..." class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-alamat" class=" form-control-label">Alamat</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea id="hf-alamat" name="alamat" placeholder="Masukkan Alamat..." class="form-control">{{$datasiswa->alamat}}</textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-handphone" class=" form-control-label">No. Handphone</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" id="hf-handphone" name="handphone" value="{{$datasiswa->handphone}}" placeholder="Masukkan No. Handphone..." class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-12">
                                        <label for="hf-handphone" class=" form-control-label">*Note: Masukkan No. Handphone dimulai dari angka 08xx</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button form="form1" type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Update
                </button>
                <button form="form1" type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    function showHide(){
        var x = document.getElementById('hf-password');
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
@endsection