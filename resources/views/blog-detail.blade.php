@extends('layouts.myApp')

@section('judul-page')
{{$data->judul_blog}} - Blog
@endsection

@section('head')
<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
@endsection

@section('content')
<div class="hero-wrap hero-wrap-2"
  style="background-image: url('{{asset('image/home/bg1-image.jpg')}}'); background-attachment:fixed;">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
      <div class="col-md-8 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> <span
            class="mr-2"><a href="{{route('blog')}}">Blog</a></span> <span>Blog Details</span></p>
        <h1 class="mb-3 bread">{{$data->judul_blog}}</h1>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-md-8 ftco-animate">
        <p>
          <img src="{{asset('image/blog')}}/{{$data->image}}" alt="" class="img-fluid">
        </p>
        {!!$data->isi_blog!!}
      </div>
      <div class="col-md-4 sidebar ftco-animate">
        <div class="sidebar-box ftco-animate">
          <h3>Recent Blog</h3>
          @foreach($blogs as $blog)
          <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url('{{asset('image/blog/')}}/{{$blog->image}}');"></a>
            <div class="text">
              <h3 class="heading"><a href="{{URL::to('home/blog')}}/{{$blog->id}}/{{$blog->judul_blog}}/data"">{{$blog->judul_blog}}</a></h3>
              <div class="meta">
                <div><a href="{{URL::to('home/blog')}}/{{$blog->id}}/{{$blog->judul_blog}}/data""><span class="icon-calendar"></span> {{date('d M Y', strtotime($blog->created_at))}}</a></div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
@endsection