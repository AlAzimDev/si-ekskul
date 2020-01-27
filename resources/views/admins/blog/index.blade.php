@extends('layouts.myApp')

@section('judul-page','Blog')

@section('head')
<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>
@endsection

@section('content')
<div class="modal fade col-md-12" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
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
                            <form method="post" id="form1" class="form-horizontal"  action="{{route('admin-blog-store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-judul-blog" class=" form-control-label">Judul Soal</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="hf-judul-blog" name="judul_blog" placeholder="Masukkan Judul Blog..." required="" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-image" class=" form-control-label">Image</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="hf-image"  accept="image/x-png,image/jpeg" name="image" required="" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-12 col-md-12">
                                        <textarea id="summernote" name="isi_blog"></textarea>
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
            </div>
        </div>
    </div>
</div>

<div class="hero-wrap hero-wrap-2" style="background-image: url('{{asset('genius/images/bg_2.jpg')}}'); background-attachment:fixed;">
    <div class="overlay"></div>
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-8 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="{{route('admin-home')}}">Home</a></span> <span>Blog</span></p>
            <a href="javascript:void(0)" data-toggle="modal" data-target="#mediumModal">
                <i class="icon-add"></i><h1 class="mb-3 bread">Add Blog</h1>
            </a>
        </div>
    </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
        @foreach($blog as $data)
            <div class="col-md-4 ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="{{URL::to('tutor/blog')}}/{{$data->id}}/{{$data->judul_blog}}/data" class="block-20"
                        style="background-image: url('{{asset('image/blog/')}}/{{$data->image}}');">
                    </a>
                    <div class="text p-4 d-block">
                        <div class="meta mb-3">
                            <div><a href="{{URL::to('tutor/blog')}}/{{$data->id}}/{{$data->judul_blog}}/data">{{$data->created_at}}</a><a href="{{URL::to('tutor/blog')}}/{{$data->id}}/{{$data->judul_blog}}/hapus" class="btn btn-danger"><i class="icon-trash"></i></a></div>
                        </div>
                        <h3 class="heading mt-3"><a href="{{URL::to('tutor/blog')}}/{{$data->id}}/{{$data->judul_blog}}/data">{{$data->judul_blog}}</a></h3>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
        placeholder: 'Tap disini untuk memasukkan isi blogmu',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['para', ['paragraph']],
          ['insert', ['link', 'picture']],
          ['view', ['fullscreen']]
        ]
        });
    });
</script>
@endsection