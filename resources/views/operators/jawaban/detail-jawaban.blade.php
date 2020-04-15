@extends('operators.layout.header')

@section('judul-page','Detail Nilai')
@section('content')
<br/>
@include('operators.layout.alert')
<div class="row">
    <div class="col-lg-12">
        <div class="modal-body">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body card-block">
                        <form method="post" id="form1" class="form-horizontal" action="#" >
                        @csrf
                        @foreach($jawabans as $answer)
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <label for="hf-materi-pembelajaran" class=" form-control-label">Soal: {!!$answer->datasoal->soal!!}</label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-12 col-md-8">
                                    <label for="hf-materi-pembelajaran" class=" form-control-label">Jawaban: {!!$answer->jawaban!!}</label>
                                </div>
                                <div class="col-12 col-md-4">
                                <label for="hf-materi-pembelajaran" class=" form-control-label float-right">Persentasi jawaban: {!!$answer->persentasi!!}%</label>
                                </div>
                            </div>
                            <hr/>
                        @endforeach
                            <div class="row form-group">
                                <div class="col col-md-12 float-right">
                                    <label for="hf-materi-pembelajaran" class=" form-control-label float-right">Dengan Rata-Rata Nilai: {{number_format($jawabans->avg('persentasi'),2)}}.</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>

</script>
@endsection