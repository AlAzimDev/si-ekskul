@extends('operators.layout.header')

@section('judul-page','Pemeriksaan Jawaban')
@section('content')
<br/>
@include('operators.layout.alert')
<div class="row">
    <div class="col-lg-12">
        <div class="modal-body">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body card-block">
                        <form method="post" id="form1" class="form-horizontal" action="{{route('operator-jawaban-store')}}/" >
                        @csrf
                        <div class="row form-group">
                            <div class="col col-md-12">
                                <label for="hf-materi-pembelajaran" class=" form-control-label">*Note: Masukkan Persentasi dimulai dari angka 0 - 100.</label>
                            </div>
                        </div>
                        @foreach($answers2 as $answer)
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
                                    <input type="hidden" name="id[]" value="{!!$answer->id!!}">
                                    <input type="number" min="0" max="100" id="hf-materi-pembelajaran" name="persentasi[]" placeholder="Masukkan Persentasi Jawaban..." required="" class="form-control">
                                </div>
                            </div>
                            <hr/>
                        @endforeach
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <label for="hf-materi-pembelajaran" class=" form-control-label">*Note: Masukkan Persentasi dimulai dari angka 0 - 100.</label>
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
@endsection
@section('script')
<script>

</script>
@endsection