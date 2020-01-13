@extends('admins.layout.header')

@section('judul-page','Nilai')
@section('button')
<a href="button" class="au-btn au-btn-icon btn-warning" >
    <i class="zmdi zmdi-collection-text"></i>Jawaban</a>
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
                    <th>Materi Pembelajaran</th>
                    <th style="text-align: right">Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>

</script>
@endsection