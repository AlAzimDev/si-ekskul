@extends('admins.layout.header')

@section('judul-page','Data Siswa')
@section('button')
<button type="button" class="au-btn au-btn-icon au-btn--green" data-toggle="modal" data-target="#mediumModal1">
    <i class="zmdi zmdi-download"></i>export data siswa</button>
<button type="button" class="au-btn au-btn-icon" data-toggle="modal" data-target="#mediumModal2" style="background-color: orange">
    <i class="zmdi zmdi-download"></i>import data siswa</button>
<button type="button" class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#mediumModal">
    <i class="zmdi zmdi-plus"></i>tambahkan data</button>
@endsection
@section('head')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<!-- <link rel="stylesheet" href="{{ asset('admin/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') }}"> -->
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
                            <form method="post" id="form1" class="form-horizontal" action="{{route('admin-users-siswa-store')}}" >
                                @csrf
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
                                        <input type="checkbox" onclick="showHide()"> Show Password
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
                                        <label for="hf-nama-panggilan" class=" form-control-label">Nama Panggilan</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="hf-nama-panggilan" name="nama_panggilan" placeholder="Masukkan Nama Panggilan..." required="" class="form-control">
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
                                        <input type="number" id="hf-handphone" name="handphone" placeholder="Masukkan No. Handphone..." class="form-control">
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
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
                <button form="form1" type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="mediumModal1" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="card-header col-md-11"><strong>Export Data Siswa</strong> Form</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body card-block">
                            <form method="post" id="form2" class="form-horizontal" action="{{route('admin-users-siswa-download')}}" >
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-email" class=" form-control-label">Waktu</label>
                                    </div>
                                    <div class="col-12 col-md-3" id="waktu" style="display: none">
                                        <input type="number" name="waktu" min ="1" max="100" class="form-control">
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="format_waktu" id="format_waktu" onchange="formatWaktu()" class="form-control-lg form-control">
                                            <option value="semua_waktu">Semua Waktu</option>
                                            <option value="hari_ini">Hari Ini</option>
                                            <option value="bulan_ini">Bulan Ini</option>
                                            <option value="tahun_ini">Tahun Ini</option>
                                            <option value="jam">Jam Terakhir</option>
                                            <option value="hari">Hari Terakhir</option>
                                            <option value="minggu">Minggu Terakhir</option>
                                            <option value="bulan">Bulan Terakhir</option>
                                            <option value="tahun">Tahun Terakhir</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                    </div>
                                    <div class="col col-md-9">
                                        <div class="form-check">
                                            <div class="checkbox">
                                                <label for="checkbox1" class="form-check-label ">
                                                    <input type="checkbox" id="checkbox1" name="mode" value="password" class="form-check-input"> Tampilkan Kolom Password
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-email" class=" form-control-label">Extension</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="extension" class="form-control-lg form-control">
                                            <option value="xlsx">.XLSX</option>
                                            <option value="xls">.XLS</option>
                                            <option value="csv">.CSV</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button form="form2" type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="mediumModal2" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="card-header col-md-11"><strong>Import Data Siswa</strong> Form</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body card-block">
                            <form method="post" id="form3" class="form-horizontal" action="{{route('admin-users-siswa-import')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-12">
                                        <label for="hf-email center" class=" form-control-label">*Note: Import hanya bisa dilakukan jika colum sesui dengan gambar di bawah ini.</label>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-12">
                                        <img src="{{asset('image/home/import_ex.png')}}" alt="Import Example">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-email" class=" form-control-label">File</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" name="import_file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button form="form3" type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
                <button form="form3" type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<br/>
@include('admins.layout.alert')
<!-- <div class="section__content section__content--p30">
    <div class="container-fluid"> -->
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-borderless table-striped table-earning" id="example">
                        <thead>
                        <tr>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Nama Lengkap</th>
                            <th>Nama Panggilan</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat & Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Handphone</th>
                            <th style="text-align: right">Tindakan</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    <!-- </div>
</div> -->
@endsection
@section('script')
<!-- <script src="{{ asset('admin/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script> -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(function () {
    //$('#example1').DataTable()
    var table = $('#example').DataTable({
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
                { data: 'email', name: 'email' },
                { data: 'password2', name: 'password2' },
                { data: 'nama_lengkap', name: 'nama_lengkap' },
                { data: 'nama_panggilan', name: 'nama_panggilan' },
                { data: 'jenis_kelamin', name: 'jenis_kelamin' },
                { data: 'tempattanggal_lahir', name: 'tempattanggal_lahir' },
                { data: 'alamat', name: 'alamat' },
                { data: 'handphone', name: 'handphone' },
                { data: 'action', orderable: false, searchable: true, className: 'dt-body-right' }
             ],
    "language": {
        "lengthMenu": "Menampilkan _MENU_ records per halaman",
        "zeroRecords": "Tidak menemukan data apapun - maaf",
        "info": "Menampilkan _PAGE_ dari _PAGES_ halaman",
        "infoEmpty": "Tidak menemukan data apapun",
        "infoFiltered": "(difilter dari _MAX_ total records)",
        "infoPostFix":    "",
        "thousands":      ",",
        "loadingRecords": "Memuat...",
        "processing":     "Proses...",
        "search":         "Cari:",
        "paginate": {
            "first":      "Pertama",
            "last":       "Terakhir",
            "next":       "Selanjutnya",
            "previous":   "Sebelumnya"
        },
        "aria": {
            "sortAscending":  ": aktifkan untuk mengurutkan kolom naik",
            "sortDescending": ": aktifkan untuk mengurutkan kolom turun"
        }
    }
    })
  });
    function adminDelete() {
        var postId = $(event.currentTarget).data('admin');
        swal({
            title: "yakin untuk menghapus data ini?",
            type: "info",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger waves-effect waves-light',
            confirmButtonText: "Hapus",
            cancelButtonText: "Tidak",
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(){
            window.location.href = postId;
        });
    }
    function showHide(){
        var x = document.getElementById('hf-password');
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    function formatWaktu(){
        var x = document.getElementById('format_waktu');
        console.log(x.value);
        if (x.value == "semua_waktu") {
            document.getElementById('waktu').style.display = "none";
            document.getElementById('format_waktu').parentElement.className = 'col-12 col-md-9';
        } else if (x.value == "hari_ini") {
            document.getElementById('waktu').style.display = "none";
            document.getElementById('format_waktu').parentElement.className = 'col-12 col-md-9';
        } else if (x.value == "bulan_ini") {
            document.getElementById('waktu').style.display = "none";
            document.getElementById('format_waktu').parentElement.className = 'col-12 col-md-9';
        } else if (x.value == "tahun_ini") {
            document.getElementById('waktu').style.display = "none";
            document.getElementById('format_waktu').parentElement.className = 'col-12 col-md-9';
        } else {
            document.getElementById('waktu').style.display = "block";
            document.getElementById('format_waktu').parentElement.className = 'col-12 col-md-6';
        }
    }
</script>
@endsection