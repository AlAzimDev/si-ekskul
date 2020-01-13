@extends('admins.layout.header')

@section('judul-page','Soal')
@section('button')
<button type="button" class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#mediumModal">
    <i class="zmdi zmdi-plus"></i>add data</button>
@endsection
@section('head')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                            <form method="post" id="form1" class="form-horizontal" action="{{route('admin-soal-store')}}" >
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-judul-soak" class=" form-control-label">Judul Soal</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="hf-judul-soak" name="judul_soal" placeholder="Masukkan Judul Soal..." required="" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-waktu-mulai" class=" form-control-label">Waktu Mulai</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="datetime-local" id="hf-waktu-mulai" name="waktu_mulai" required="" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-waktu-berhenti" class=" form-control-label">Waktu Berhenti</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="datetime-local" id="hf-waktu-berhenti" name="waktu_berhenti" required="" class="form-control">
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
<div class="modal fade" id="mediumModalShareAbsen" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p>Share Absensi</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body card-block">
                            <div class="col col-md-12" align="center">
                                <p>Note: Ketuk Code QR untuk men-download gambar</p>
                                <a target="_blank" href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(1000)->generate(URL::to('/'))) !!} "  download="Soal">
                                    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate(URL::to('/'))) !!} " class="center">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                    <th>Judul Soal</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Berhenti</th>
                    <th style="text-align: right">Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
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
      ajax: '{!! route('admin-soal-data') !!}',
      columns: [
                { data: 'judul_soal', name: 'judul_soal' },
                { data: 'waktu_mulai', name: 'waktu_mulai' },
                { data: 'waktu_berhenti', name: 'waktu_berhenti' },
                { data: 'action', className: 'dt-right', orderable: false, searchable: true }
             ],
    })
  })
</script>
@endsection