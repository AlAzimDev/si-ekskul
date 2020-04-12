@extends('admins.layout.header')

@section('judul-page','Detail Data Absensi')
@section('head')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
<br/>
@include('admins.layout.alert')
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-borderless table-striped table-earning" id="example">
                <thead>
                <tr>
                    <th>Nama</th>
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
      ajax: '/tutor/absensi/detail/get-data-detail/{{$id}}/{{$materi_pembelajaran}}/detail',
      columns: [
                { data: 'nama_user', name: 'nama_user' },
                // { data: 'action', orderable: false, searchable: true }
             ],
    })
  })
</script>
@endsection