@extends('layouts.app')

@section('content')
<div class="hero-wrap" style="background-image: url('{{asset('genius/images/bg_1.jpg')}}'); background-attachment:fixed;">
    <div class="overlay"></div>
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-8 ftco-animate text-center">
        <h1 class="mb-4">SMK Negeri 2 Kecamatan Guguak</h1>
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
                            <span>Apa yang anda cari disini?</span>
                            <h3>Ingin mencari informasi tentang ekstrakulikuler sekolah kami?</h3>
                            <p>Atau Hanya Sekedar Browsing?</p>
                        </div>
                        <div class="one-forth order-first img" style="background-image: url({{asset('genius/images/image_1.jpg')}});"></div>
                    </div>
                    <div class="full-wrap ftco-animate">
                        <div class="one-half">
                            <div class="featured-blog d-md-flex">
                                <div class="image d-flex order-last">
                                    <a href="#" class="img" style="background: url({{asset('genius/images/image_2.jpg')}});"></a>
                                </div>
                                <div class="text order-first">
                                    <!-- <span class="date">Aug 20, 2018</span> -->
                                    <h3><a href="#">Informatif Website Tentang Ekstrakulikuler</a></h3>
                                        <p>Selamat datang dan selamat membaca, disini adalah tempat informatif berisi informasi tentang ekstrakulikuler SMKN 2 Guguak.</p>
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


<section class="ftco-section-3 img" style="background-image: url({{asset('genius/images/bg_3.jpg')}});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row d-md-flex justify-content-center">
            <div class="col-md-9 about-video text-center">
                <h2 class="ftco-animate">Tentang Sekolah Kami? <br/>Tekan ombol di dibawah!</h2>
                <div class="video d-flex justify-content-center">
                    <a href="https://vimeo.com/45830194" class="button popup-vimeo d-flex justify-content-center align-items-center"><span class="ion-ios-play"></span></a>
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
        <div class="col-md-4 d-flex ftco-animate">
        <div class="blog-entry align-self-stretch">
            <a href="blog-single.html" class="block-20" style="background-image: url('{{asset('genius/images/image_1.jpg')}}');">
            </a>
            <div class="text p-4 d-block">
            <div class="meta mb-3">
                <div><a href="#">August 12, 2018</a></div>
            </div>
            <h3 class="heading mt-3"><a href="#">How to standout at start of your UX Career</a></h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            </div>
        </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
        <div class="blog-entry align-self-stretch">
            <a href="blog-single.html" class="block-20" style="background-image: url('{{asset('genius/images/image_2.jpg')}}');">
            </a>
            <div class="text p-4 d-block">
            <div class="meta mb-3">
                <div><a href="#">August 12, 2018</a></div>
            </div>
            <h3 class="heading mt-3"><a href="#">How to standout at start of your UX Career</a></h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            </div>
        </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
        <div class="blog-entry align-self-stretch">
            <a href="blog-single.html" class="block-20" style="background-image: url('{{asset('genius/images/image_3.jpg')}}');">
            </a>
            <div class="text p-4 d-block">
            <div class="meta mb-3">
                <div><a href="#">August 12, 2018</a></div>
            </div>
            <h3 class="heading mt-3"><a href="#">How to standout at start of your UX Career</a></h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
        <h2 class="mb-4">Events</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 d-flex ftco-animate">
        <div class="blog-entry align-self-stretch">
            <a href="blog-single.html" class="block-20" style="background-image: url('{{asset('genius/images/event-1.jpg')}}');">
            </a>
            <div class="text p-4 d-block">
            <div class="meta mb-3">
                <div><a href="#">Sep. 10, 2018</a></div>
            </div>
            <h3 class="heading mb-4"><a href="#">Intern Bootcamp Meetup 2018</a></h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            <p><a href="event.html">Baca Selengkapnya <i class="ion-ios-arrow-forward"></i></a></p>
            </div>
        </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
        <div class="blog-entry d-flex align-self-stretch flex-column-reverse">
            <a href="blog-single.html" class="block-20" style="background-image: url('{{asset('genius/images/event-2.jpg')}}');">
            </a>
            <div class="text p-4 d-block">
            <div class="meta mb-3">
                <div><a href="#">Sep. 10, 2018</a></div>
            </div>
            <h3 class="heading mb-4"><a href="#">Intern Bootcamp Meetup 2018</a></h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            <p><a href="event.html">Baca Selengkapnya <i class="ion-ios-arrow-forward"></i></a></p>
            </div>
        </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
        <div class="blog-entry align-self-stretch">
            <a href="blog-single.html" class="block-20" style="background-image: url('{{asset('genius/images/event-3.jpg')}}');">
            </a>
            <div class="text p-4 d-block">
            <div class="meta mb-3">
                <div><a href="#">Sep. 10, 2018</a></div>
            </div>
            <h3 class="heading mb-4"><a href="#">Intern Bootcamp Meetup 2018</a></h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            <p><a href="event.html">Baca Selengkapnya <i class="ion-ios-arrow-forward"></i></a></p>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
@endsection