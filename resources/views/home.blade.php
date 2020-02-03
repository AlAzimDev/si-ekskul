@extends('layouts.myApp')

@section('judul-page','SMK N 2 GUGUAK - Ekstrakurikuler')

@section('content')
<div class="hero-wrap" style="background-image: url('{{asset('image/home/bg1-image.jpg')}}'); background-attachment:fixed;">
    <div class="overlay"></div>
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-8 ftco-animate text-center">
        <h1 class="mb-4">@if($home->where('jenis','judul-besar')->first()){{$home->where('jenis','judul-besar')->first()->isi}}@else SMK N 2 Kecamatan Guguak @endif</h1>
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
                            <span>@if($home->where('jenis','w1')->first()){{$home->where('jenis','w1')->first()->isi}}@else Apa yang Anda cari disini? @endif</span>
                            <h3>@if($home->where('jenis','w2')->first()){{$home->where('jenis','w2')->first()->isi}}@else Membaca website kami? @endif</h3>
                            <p>@if($home->where('jenis','w3')->first()){{$home->where('jenis','w3')->first()->isi}}@else Atau hanya mampir? @endif</p>
                        </div>
                        <div class="one-forth order-first img" style="background-image: url({{asset('image/home/ct1-image.jpg')}});"></div>
                    </div>
                    <div class="full-wrap ftco-animate">
                        <div class="one-half">
                            <div class="featured-blog d-md-flex">
                                <div class="image d-flex order-last">
                                    <a class="img" style="background: url({{asset('image/home/ct2-image.jpg')}});"></a>
                                </div>
                                <div class="text order-first">
                                    <!-- <span class="date">Aug 20, 2018</span> -->
                                    <h3><a href="javascript:void(0)">@if($home->where('jenis','judul-kecil')->first()){{$home->where('jenis','judul-kecil')->first()->isi}}@else Informatif Website Ekstrakulikuler @endif</a></h3>
                                        <p>@if($home->where('jenis','description1')->first()){{$home->where('jenis','description1')->first()->isi}}@else Deskripsi tentang website ini @endif</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row">
        <div class="col-md-4 d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services p-3 py-4 d-block text-center">
            <div class="icon d-flex justify-content-center align-items-center mb-3"><span class="flaticon-exam"></span></div>
            <div class="media-body px-3">
            <h3 class="heading">Menyelesaikan Tugas Sesuai Dengan Ekstrakulikuler</h3>
            <p>Setiap ekstrakulikuler pasti memiliki tugas, entah itu berupa fisik ataupun materi(sesuai dengan ekstrakulikulernya).</p>
            </div>
        </div>      
        </div>
        <div class="col-md-4 d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services p-3 py-4 d-block text-center">
            <div class="icon d-flex justify-content-center align-items-center mb-3"><span class="flaticon-blackboard"></span></div>
            <div class="media-body px-3">
            <h3 class="heading">Mengajarkan Siswa Sampai Bisa</h3>
            <p>Setiap materi haruslah dimengerti oleh siswa yang bersangkutan.</p>
            </div>
        </div>      
        </div>
        <div class="col-md-4 d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services p-3 py-4 d-block text-center">
            <div class="icon d-flex justify-content-center align-items-center mb-3"><span class="flaticon-books"></span></div>
            <div class="media-body px-3">
            <h3 class="heading">Materi Dan Pembimbing yang Terpercaya</h3>
            <p>Materi kami ialah materi dari guru yang terpercaya dan paham betul dengan ekstrakulikuler yang bersangkutan.</p>
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
                <h2 class="ftco-animate">@if($home->where('jenis','judul-menengah')->first()){{$home->where('jenis','judul-menengah')->first()->isi}}@else Tentang Kami @endif <br/>Tekan tombol di dibawah!</h2>
                <div class="video d-flex justify-content-center">
                    <iframe width="560" height="315" src="@if($home->where('jenis','link-video')->first()){{$home->where('jenis','link-video')->first()->isi}}@endif" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Blog</h2>
            </div>
        </div>
        <div class="row d-flex">
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