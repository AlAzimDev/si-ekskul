@extends('operators.layout.header')

@section('judul-page','Data Siswa')
@section('button')
<button type="button" class="au-btn au-btn-icon au-btn--green" data-toggle="modal" data-target="#mediumModal1">
    <i class="zmdi zmdi-download"></i>export data siswa</button>
@endsection
@section('head')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<!-- <link rel="stylesheet" href="{{ asset('admin/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') }}"> -->
@endsection
@section('modal')
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
                            <form method="post" id="form2" class="form-horizontal" action="{{route('operator-siswa-download')}}" >
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
                    <i class="fa fa-dot-circle-o"></i> Export
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<br/>
<!-- <div class="section__content section__content--p30">
    <div class="container-fluid"> -->
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-borderless table-striped table-earning" id="example">
                        <thead>
                        <tr>
                            <th>Email</th>
                            <th>Nama Lengkap</th>
                            <th>Nama Panggilan</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat & Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Handphone</th>
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
      ajax: '{!! route('operator-siswa-data') !!}',
      columns: [
                { data: 'email', name: 'email' },
                { data: 'nama_lengkap', name: 'nama_lengkap' },
                { data: 'nama_panggilan', name: 'nama_panggilan' },
                { data: 'jenis_kelamin', name: 'jenis_kelamin' },
                { data: 'tempattanggal_lahir', name: 'tempattanggal_lahir' },
                { data: 'alamat', name: 'alamat' },
                { data: 'handphone', name: 'handphone' }
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