@extends('admins.layout.header')

@section('judul-page','Data Soal-Soal')
@section('button')
<button type="button" class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#mediumModal">
    <i class="zmdi zmdi-plus"></i>add data</button>
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
                            <form method="post" id="form1" class="form-horizontal" action="data/store" >
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-12">
                                        <a href="#" class="addRow float-right"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                                <div class="row form-group newRow">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label">Soal</label>
                                    </div>
                                    <div class="col-11 col-md-8">
                                        <textarea class="form-control" name="soal[]" placeholder="Masukkan Soal..." required></textarea>
                                    </div>
                                    <a href="#" class="removeRow float-right danger"><i class="fa fa-trash"></i></a>
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
@include('admins.layout.alert')
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-borderless table-striped table-earning" id="example">
                <thead>
                <tr>
                    <th>Soal</th>
                    <th style="text-align: right">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($datasoal as $data)
                <tr>
                    <td>{{$data->soal}}</td>
                    <td style="text-align: right"><a href="data/{{$data->id}}/{{$data->soal}}/hapus" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function(){
    $('.addRow').on('click', function(){
        addRow();
    });
    function addRow(){
        var tr=
        '<div class="row form-group newRow">'+
            '<div class="col col-md-3">'+
                '<label class=" form-control-label">Soal</label>'+
            '</div>'+
            '<div class="col-11 col-md-8">'+
                '<textarea class="form-control" name="soal[]" placeholder="Masukkan Soal..." required></textarea>'+
            '</div>'+
            '<a href="#" class="removeRow float-right danger"><i class="fa fa-trash"></i></a>'+
        '</div>';
        $('#form1').append(tr);
    }
    $('div').on('click','.removeRow',function(){
        var last = $('#form1 .form-group').length;
        if(last > 2){
            $(this).parent().remove();
        }
    });
});
</script>
@endsection