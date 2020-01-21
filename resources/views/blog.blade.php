@extends('layouts.myApp')

@section('content')
<div class="hero-wrap hero-wrap-2" style="background-image: url('{{asset('genius/images/bg_2.jpg')}}'); background-attachment:fixed;">
    <div class="overlay"></div>
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-8 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> <span>Blog</span></p>
        <h1 class="mb-3 bread">Blog</h1>
        </div>
    </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row d-flex">
        <div class="col-md-4 d-flex ftco-animate">
        <div class="blog-entry align-self-stretch">
            <a href="blog-single.html" class="block-20" style="background-image: url('{{asset('genius/images/image_4.jpg')}}');">
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
        <div class="col-md-4 d-flex ftco-animate">
        <div class="blog-entry align-self-stretch">
            <a href="blog-single.html" class="block-20" style="background-image: url('{{asset('genius/images/image_4.jpg')}}');">
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
            <a href="blog-single.html" class="block-20" style="background-image: url('{{asset('genius/images/image_5.jpg')}}');">
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
            <a href="blog-single.html" class="block-20" style="background-image: url('{{asset('genius/images/image_6.jpg')}}');">
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
        <div class="row mt-5">
        <div class="col text-center">
        <div class="block-27">
            <ul>
            <li><a href="#">&lt;</a></li>
            <li class="active"><span>1</span></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">&gt;</a></li>
            </ul>
        </div>
        </div>
    </div>
    </div>
</section>
@endsection