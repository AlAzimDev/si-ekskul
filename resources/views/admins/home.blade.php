<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin - Home Settings</title>
    <link rel="icon" href="{{asset('image/icon.jpg')}}" type="image/icon type" />
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
            <a class="navbar-brand" href="{{route('home')}}"><i class="flaticon-university"></i>SMK2GGK
                <br><small>Ekstrakulikuler</small></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
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

    <div class="modal fade col-md-12" id="modal1" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
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
                                <form method="post" id="form1" class="form-horizontal"
                                    action="{{route('admin-home-modal1')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hf-judul-besar" class=" form-control-label">Judul</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="hf-judul-besar" name="judul_besar"
                                                placeholder="Masukkan Judul..." required="" class="form-control"
                                                value="@if($home->where('jenis','judul-besar')->first()){{$home->where('jenis','judul-besar')->first()->isi}}@endif">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hf-image" class=" form-control-label">Background Image</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="hf-image" accept="image/jpeg" name="bg1_image"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12 col-md-12">
                                            <p>* Note: Masukkan foto baru dengan format .jpg untuk mengubah background
                                                image.</p>
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
    <div class="modal fade col-md-12" id="modal2" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
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
                                <form method="post" id="form2" class="form-horizontal"
                                    action="{{route('admin-home-modal2')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hf-judul" class=" form-control-label">Judul</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="hf-judul" name="judul_kecil"
                                                placeholder="Masukkan Judul..." required="" class="form-control"
                                                value="@if($home->where('jenis','judul-kecil')->first()){{$home->where('jenis','judul-kecil')->first()->isi}}@endif">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hf-description" class=" form-control-label">Deskripsi</label>
                                        </div>
                                        <div class="col-12 col-md-9 md-4">
                                            <textarea id="hf-description" name="description1"
                                                placeholder="Masukkan Deskripsi..." required=""
                                                class="form-control">@if($home->where('jenis','description1')->first()){{$home->where('jenis','description1')->first()->isi}}@endif</textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hf-ct1-image" class=" form-control-label">Image 1</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="hf-ct1-image" accept="image/x-png,image/jpeg"
                                                name="ct1_image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hf-ct2-image" class=" form-control-label">Image 2</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="hf-ct2-image" accept="image/x-png,image/jpeg"
                                                name="ct2_image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12 col-md-12">
                                            <p>* Note: Masukkan foto baru berformat .jpg untuk mengubah foto, kosongkan
                                                jika tidak ingin menukar.</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12 col-md-12">
                                            <input type="text" name="w1" placeholder="Masukkan Text..." required=""
                                                class="form-control"
                                                value="@if($home->where('jenis','w1')->first()){{$home->where('jenis','w1')->first()->isi}}@endif">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12 col-md-12">
                                            <input type="text" name="w2" placeholder="Masukkan Text..." required=""
                                                class="form-control"
                                                value="@if($home->where('jenis','w2')->first()){{$home->where('jenis','w2')->first()->isi}}@endif">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12 col-md-12">
                                            <input type="text" name="w3" placeholder="Masukkan Text..." required=""
                                                class="form-control"
                                                value="@if($home->where('jenis','w3')->first()){{$home->where('jenis','w3')->first()->isi}}@endif">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button form="form2" type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade col-md-12" id="modal3" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
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
                                <form method="post" id="form3" class="form-horizontal"
                                    action="{{route('admin-home-modal3')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hf-judul-menengah" class=" form-control-label">Judul</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="hf-judul-menengah" name="judul_menengah"
                                                placeholder="Masukkan Judul..." required="" class="form-control"
                                                value="@if($home->where('jenis','judul-menengah')->first()){{$home->where('jenis','judul-menengah')->first()->isi}}@endif">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hf-image" class=" form-control-label">Background Image</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="hf-image" accept="image/jpeg" name="bg2_image"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12 col-md-12">
                                            <p>* Note: Masukkan foto baru dengan format .jpg untuk mengubah background
                                                image.</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hf-link-video" class=" form-control-label">Link</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="hf-link-video" name="link_video"
                                                placeholder="https://www.youtube.com/embed/..." required="" class="form-control"
                                                value="@if($home->where('jenis','link-video')->first()){{$home->where('jenis','link-video')->first()->isi}}@endif">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12 col-md-12">
                                            <p>* Note: Masukkan link video youtube. Example: https://www.youtube.com/embed/...</p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button form="form3" type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade col-md-12" id="modal4" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
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
                                <form method="post" id="form4" class="form-horizontal"
                                    action="{{route('admin-home-modal4')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hf-description2" class=" form-control-label">Deskripsi</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea type="text" id="hf-description2" name="description2"
                                                placeholder="Masukkan Deskripsi..." required=""
                                                class="form-control">@if($home->where('jenis','description2')->first()){{$home->where('jenis','description2')->first()->isi}}@endif</textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hf-social-facebook" class=" form-control-label">Facebook</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="hf-social-facebook" name="social_facebook"
                                                placeholder="https://www.facebook.com/group/..." class="form-control"
                                                value="@if($home->where('jenis','social-facebook')->first()){{$home->where('jenis','social-facebook')->first()->isi}}@endif">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hf-social-instagram"
                                                class=" form-control-label">Instagram</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="hf-social-instagram" name="social_instagram"
                                                placeholder="https://www.instagram.com/..." class="form-control"
                                                value="@if($home->where('jenis','social-instagram')->first()){{$home->where('jenis','social-instagram')->first()->isi}}@endif">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hf-social-twitter" class=" form-control-label">Twitter</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="hf-social-twitter" name="social_twitter"
                                                placeholder="https://www.twitter.com/..." class="form-control"
                                                value="@if($home->where('jenis','social-twitter')->first()){{$home->where('jenis','social-twitter')->first()->isi}}@endif">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12 col-md-12">
                                            <p>* Note: Gunakan http atau https pada link. Kosongkan jika tidak ingin
                                                menampilkan sosial media terkait.</p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button form="form4" type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade col-md-12" id="modal5" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
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
                                <form method="post" id="form5" class="form-horizontal"
                                    action="{{route('admin-home-modal5')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hf-footer-judul" class=" form-control-label">Judul</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="hf-footer-judul" name="footer_judul"
                                                placeholder="Masukkan Judul..." required="" class="form-control"
                                                value="@if($home->where('jenis','footer-judul')->first()){{$home->where('jenis','footer-judul')->first()->isi}}@endif">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hf-footer-link" class=" form-control-label">Link</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="hf-footer-link" name="footer_link"
                                                placeholder="Masukkan Judul Link..." required="" class="form-control"
                                                value="@if($home->where('jenis','footer-link')->first()){{$home->where('jenis','footer-link')->first()->isi}}@endif">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12 col-md-12">
                                            <p>* Note: Gunakan http atau https pada link.</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hf-image" class=" form-control-label">Background Image</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="hf-image" accept="image/jpeg" name="bg3_image"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12 col-md-12">
                                            <p>* Note: Masukkan foto baru dengan format .jpg untuk mengubah background
                                                image.</p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button form="form5" type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-wrap"
        style="background-image: url('{{asset('image/home/bg1-image.jpg')}}'); background-attachment:fixed;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center"
                data-scrollax-parent="true">
                <div class="col-md-8 ftco-animate text-center">
                    <h1 class="mb-4"><button class="btn btn-light" data-toggle="modal" data-target="#modal1"><i
                                class="icon-edit"></i></button>@if($home->where('jenis','judul-besar')->first()){{$home->where('jenis','judul-besar')->first()->isi}}@else
                        SMK N 2 Kecamatan Guguak @endif</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-search-course">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="courseSearch-wrap d-md-flex flex-column-reverse">
                        <div class="full-wrap d-flex ftco-animate">
                            <div class="one-third order-last p-5">
                                <span>@if($home->where('jenis','w1')->first()){{$home->where('jenis','w1')->first()->isi}}@else
                                    Apa yang Anda cari disini? @endif</span>
                                <h3>@if($home->where('jenis','w2')->first()){{$home->where('jenis','w2')->first()->isi}}@else
                                    Membaca website kami? @endif</h3>
                                <p>@if($home->where('jenis','w3')->first()){{$home->where('jenis','w3')->first()->isi}}@else
                                    Atau hanya mampir? @endif</p>
                            </div>
                            <div class="one-forth order-first img"
                                style="background-image: url({{asset('image/home/ct1-image.jpg')}});"></div>
                        </div>
                        <div class="full-wrap ftco-animate">
                            <div class="one-half">
                                <div class="featured-blog d-md-flex">
                                    <div class="image d-flex order-last">
                                        <a class="img"
                                            style="background: url({{asset('image/home/ct2-image.jpg')}});"></a>
                                    </div>
                                    <div class="text order-first">
                                        <!-- <span class="date">Aug 20, 2018</span> -->
                                        <h3><a href="javascript:void(0)"><button class="btn btn-light"
                                                    data-toggle="modal" data-target="#modal2"><i
                                                        class="icon-edit"></i></button>@if($home->where('jenis','judul-kecil')->first()){{$home->where('jenis','judul-kecil')->first()->isi}}@else
                                                Informatif Website Ekstrakulikuler @endif</a></h3>
                                        <p>@if($home->where('jenis','description1')->first()){{$home->where('jenis','description1')->first()->isi}}@else
                                            Deskripsi tentang website ini @endif</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section-3 img" style="background-image: url({{asset('image/home/bg2-image.jpg')}});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row d-md-flex justify-content-center">
                <div class="col-md-9 about-video text-center">
                    <h2 class="ftco-animate"><button class="btn btn-light" data-toggle="modal" data-target="#modal3"><i
                                class="icon-edit"></i></button>@if($home->where('jenis','judul-menengah')->first()){{$home->where('jenis','judul-menengah')->first()->isi}}@else
                        Tentang Kami @endif <br />Tekan tombol di dibawah!</h2>
                    <div class="video d-flex justify-content-center">
                        <iframe width="560" height="315" src="@if($home->where('jenis','link-video')->first()){{$home->where('jenis','link-video')->first()->isi}}@endif" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section img"
        style="background-image: url({{asset('image/home/bg3-image.jpg')}}); background-attachment:fixed;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-5">
                    <div class="ftco-footer-widget mb-4">
                        <h2><a class="navbar-brand" href="/home"><i class="flaticon-university"></i>SMK2GGK
                                <br><small>Ekstrakulikuler</small></a></h2>

                        <button class="btn btn-light" data-toggle="modal" data-target="#modal4"><i
                                class="icon-edit"></i></button>
                        <p>@if($home->where('jenis','description2')->first()){{$home->where('jenis','description2')->first()->isi}}@else
                            Deskripsi tentang webiste ini @endif</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            @if(($home->where('jenis','social-facebook')->first() !=
                            null)&&($home->where('jenis','social-facebook')->first()->isi != null))
                            <li class="ftco-animate"><a href="{{$home->where('jenis','social-facebook')->first()->isi}}"
                                    target="_blank"><span class="icon-facebook"></span></a></li>
                            @endif
                            @if(($home->where('jenis','social-instagram')->first() !=
                            null)&&($home->where('jenis','social-instagram')->first()->isi != null))
                            <li class="ftco-animate"><a
                                    href="{{$home->where('jenis','social-instagram')->first()->isi}}"
                                    target="_blank"><span class="icon-instagram"></span></a></li>
                            @endif
                            @if(($home->where('jenis','social-twitter')->first() !=
                            null)&&($home->where('jenis','social-twitter')->first()->isi != null))
                            <li class="ftco-animate"><a href="{{$home->where('jenis','social-twitter')->first()->isi}}"
                                    target="_blank"><span class="icon-twitter"></span></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Random Blog</h2>
                        @foreach($random as $data)
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4"
                                style="background-image: url('{{asset('image/blog/')}}/{{$data->image}}');"></a>
                            <div class="text">
                                <h3 class="heading"><a
                                        href="{{URL::to('tutor/blog')}}/{{$data->id}}/{{$data->judul_blog}}/data">{{$data->judul_blog}}</a>
                                </h3>
                                <div class="meta">
                                    <div><a href="{{URL::to('tutor/blog')}}/{{$data->id}}/{{$data->judul_blog}}/data"><span
                                                class="icon-calendar"></span> {{$data->created_at}}</a></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>Copyright &copy;
                        <script>document.write(new Date().getFullYear());</script> by DonutTimAmpga | <a
                            href="@if($home->where('jenis','footer-link')->first()){{$home->where('jenis','footer-link')->first()->isi}}@endif"
                            target="_blank">@if($home->where('jenis','footer-judul')->first()){{$home->where('jenis','footer-judul')->first()->isi}}@else
                            Masukkan Footer @endif</a> <button class="btn btn-light" data-toggle="modal"
                            data-target="#modal5"><i class="icon-edit"></i></button></p>
                </div>
            </div>
        </div>
    </footer>

    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" /></svg></div>
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