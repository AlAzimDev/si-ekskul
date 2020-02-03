<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Blog - {{$data->judul_blog}}</title>
    <link rel="icon" href="{{asset('image/icon.jpg')}}" type="image/icon type"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('genius/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('genius/css/animate.css')}}">
    
    <link rel="stylesheet" href="{{asset('genius/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('genius/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('genius/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('genius/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('genius/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('genius/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('genius/css/jquery.timepicker.css')}}">

    
    <link rel="stylesheet" href="{{asset('genius/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('genius/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('genius/css/style.css')}}">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="{{route('home')}}"><i class="flaticon-university"></i>SMK2GGK <br><small>Ekstrakulikuler</small></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
            @include('admins.layout.sidebar-menu')
            <li class="nav-item cta"><a href="{{ route('logout') }}" form="form" class="nav-link" 
              onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              {{Auth::user()->name}}</a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
        </ul>
      </div>
    </div>
  </nav>
    <!-- END nav -->
  <div class="hero-wrap hero-wrap-2"
    style="background-image: url('{{asset('image/home/bg1-image.jpg')}}'); background-attachment:fixed;">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-8 ftco-animate text-center">
          <p class="breadcrumbs"><span class="mr-2"><a href="{{route('admin-home')}}">Home</a></span> <span
              class="mr-2"><a href="{{route('admin-blog-home')}}">Blog</a></span> <span>Blog Details</span></p>
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
                <h3 class="heading"><a href="{{URL::to('tutor/blog')}}/{{$blog->id}}/{{$blog->judul_blog}}/data"">{{$blog->judul_blog}}</a></h3>
                <div class="meta">
                  <div><a href="{{URL::to('tutor/blog')}}/{{$blog->id}}/{{$blog->judul_blog}}/data""><span class="icon-calendar"></span> {{$blog->created_at}}</a></div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
    <footer class="ftco-footer ftco-bg-dark ftco-section img" style="background-image: url({{asset('image/home/bg3-image.jpg')}}); background-attachment:fixed;">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2><a class="navbar-brand" href="/home"><i class="flaticon-university"></i>SMK2GGK <br><small>Ekstrakulikuler</small></a></h2>
              @yield('button-tambahan')<p>@if($home->where('jenis','description2')->first()){{$home->where('jenis','description2')->first()->isi}}@else Deskripsi tentang webiste ini @endif</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                @if(($home->where('jenis','social-facebook')->first() != null)&&($home->where('jenis','social-facebook')->first()->isi != null))
                <li class="ftco-animate"><a href="{{$home->where('jenis','social-facebook')->first()->isi}}" target="_blank"><span class="icon-facebook"></span></a></li>
                @endif
                @if(($home->where('jenis','social-instagram')->first() != null)&&($home->where('jenis','social-instagram')->first()->isi != null))
                <li class="ftco-animate"><a href="{{$home->where('jenis','social-instagram')->first()->isi}}" target="_blank"><span class="icon-instagram"></span></a></li>
                @endif
                @if(($home->where('jenis','social-twitter')->first() != null)&&($home->where('jenis','social-twitter')->first()->isi != null))
                <li class="ftco-animate"><a href="{{$home->where('jenis','social-twitter')->first()->isi}}" target="_blank"><span class="icon-twitter"></span></a></li>
                @endif
              </ul>
            </div>
          </div>
          <div class="col-md-7">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Random Blog</h2>
              @foreach($random as $data)
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url('{{asset('image/blog/')}}/{{$data->image}}');"></a>
                <div class="text">
                  <h3 class="heading"><a href="{{URL::to('tutor/blog')}}/{{$data->id}}/{{$data->judul_blog}}/data">{{$data->judul_blog}}</a></h3>
                  <div class="meta">
                    <div><a href="{{URL::to('tutor/blog')}}/{{$data->id}}/{{$data->judul_blog}}/data"><span class="icon-calendar"></span> {{$data->created_at}}</a></div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> by DonutTimAmpga | <a href="@if($home->where('jenis','footer-link')->first()){{$home->where('jenis','footer-link')->first()->isi}}@endif" target="_blank">@if($home->where('jenis','footer-judul')->first()){{$home->where('jenis','footer-judul')->first()->isi}}@else Masukkan Footer @endif</a> @yield('button-footer-tambahan')</p>
          </div>
        </div>
      </div>
    </footer>

  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  
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
            ['insert', ['link']],
            ['view', ['fullscreen']]
            ]
            });
        });
    </script>
  <!-- <script src="{{asset('genius/js/jquery.min.js')}}"></script> -->
  <script src="{{asset('genius/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('genius/js/popper.min.js')}}"></script>
  <script src="{{asset('genius/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('genius/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('genius/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('genius/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('genius/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('genius/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('genius/js/aos.js')}}"></script>
  <script src="{{asset('genius/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('genius/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('genius/js/jquery.timepicker.min.js')}}"></script>
  <script src="{{asset('genius/js/scrollax.min.js')}}"></script>
  <script src="{{asset('genius/js/google-map.js')}}"></script>
  <script src="{{asset('genius/js/main.js')}}"></script>
    
  </body>
</html>