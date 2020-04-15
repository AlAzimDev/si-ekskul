@extends('operators.layout.header')

@section('judul-page','Detail Data Absensi - '.$materi_pembelajaran)
@section('head')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
<br/>
@include('operators.layout.alert')
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-borderless table-striped table-earning" id="example">
                <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(function () {
    //$('#example1').DataTable()
    var table = $('#example').DataTable({
      processing   : true,
      serverSide: true,
      ajax: '/operator/absensi/detail/get-data-detail/{{$id}}/{{$materi_pembelajaran}}/detail',
      columns: [
                { data: 'nama_user', name: 'nama_user' },
                { data: 'email_user', name: 'email_user' },
                // { data: 'action', orderable: false, searchable: true }
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
  })
</script>
@endsection