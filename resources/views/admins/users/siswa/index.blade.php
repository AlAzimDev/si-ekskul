@extends('admins.layout.header')

@section('judul-page','Data Siswa')
@section('button')
<button type="button" class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#mediumModal">
    <i class="zmdi zmdi-plus"></i>add data</button>
@endsection
@section('head')
<link rel="stylesheet" href="{{ asset('admin/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
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
                            <form method="post" id="form1" class="form-horizontal" action="{{route('admin-users-siswa-store')}}/" >
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-name" class=" form-control-label">Username</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="hf-name" name="name" placeholder="Masukkan Username..." required="" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-email" class=" form-control-label">Email</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="email" id="hf-email" name="email" placeholder="Masukkan Email..." required="" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-password" class=" form-control-label">Password</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="password" id="hf-password" name="password" placeholder="Masukkan Password..." required="" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-nama-lengkap" class=" form-control-label">Nama Lengkap</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="hf-nama-lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap..." required="" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-jenis-kelamin" class=" form-control-label">Jenis Kelamin</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select id="hf-jenis-kelamin" name="jenis_kelamin" required="" class="form-control">
                                            <option value="ll">Laki-Laki</option>
                                            <option value="p">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-nama-panggilan" class=" form-control-label">Nama Panggilan</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="hf-nama-panggilan" name="nama_panggilan" placeholder="Masukkan Nama Panggilan..." required="" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-tempat-lahir" class=" form-control-label">Tempat Lahir</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="hf-tempat-lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir..." class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-tanggal-lahir" class=" form-control-label">Tanggal Lahir</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" id="hf-tanggal-lahir" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir..." class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-alamat" class=" form-control-label">Alamat</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea id="hf-alamat" name="alamat" placeholder="Masukkan Alamat..." class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-handphone" class=" form-control-label">No. Handphone</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="hf-handphone" name="handphone" placeholder="Masukkan No. Handphone..." class="form-control">
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
@endsection

@section('content')
<br/>
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive table--no-card m-b-30">
                    <table class="table table-borderless table-striped table-earning" id="example">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Nama Lengkap</th>
                            <th>Nama Panggilan</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Handphone</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('admin/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    //$('#example1').DataTable()
    $('#example').DataTable({
    //   'paging'      : true,
    //   'lengthChange': true,
    //   'searching'   : true,
    //   'ordering'    : true,
    //   'info'        : true,
    //   'autoWidth'   : true,
      processing   : true,
      serverSide: true,
      ajax: '{!! route('admin-users-siswa-data') !!}',
      columns: [
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'password2', name: 'password2' },
                { data: 'nama_lengkap', name: 'nama_lengkap' },
                { data: 'nama_panggilan', name: 'nama_panggilan' },
                { data: 'jenis_kelamin', name: 'jenis_kelamin' },
                { data: 'tempat_lahir', name: 'tempat_lahir' },
                { data: 'tanggal_lahir', name: 'tanggal_lahir' },
                { data: 'alamat', name: 'alamat' },
                { data: 'handphone', name: 'handphone' },
                { data: 'action', orderable: false, searchable: true }
             ],
    })
  })
</script>
@endsection