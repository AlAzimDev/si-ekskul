@extends('layouts.myApp')

@section('judul-page','Blog')

@section('content')
<div class="hero-wrap hero-wrap-2"
    style="background-image: url('{{asset('image/home/bg1-image.jpg')}}'); background-attachment:fixed;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-8 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> <span>Blog</span>
                </p>
                <h1 class="mb-3 bread">Blog</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
        @foreach($blogs as $data)
            <div class="col-md-4 ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="{{URL::to('home/blog')}}/{{$data->id}}/{{$data->judul_blog}}/data" class="block-20"
                        style="background-image: url('{{asset('image/blog/')}}/{{$data->image}}');">
                    </a>
                    <div class="text p-4 d-block">
                        <div class="meta mb-3">
                            <div><a href="{{URL::to('home/blog')}}/{{$data->id}}/{{$data->judul_blog}}/data">{{$data->created_at}}</a></div>
                        </div>
                        <h3 class="heading mt-3"><a href="{{URL::to('home/blog')}}/{{$data->id}}/{{$data->judul_blog}}/data">{{$data->judul_blog}}</a></h3>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>
@endsection