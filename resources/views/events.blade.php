@extends('layouts.app')

@section('content')
<div class="hero-wrap hero-wrap-2" style="background-image: url('{{asset('genius/images/bg_2.jpg')}}'); background-attachment:fixed;">
    <div class="overlay"></div>
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-8 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> <span>Event</span></p>
        <h1 class="mb-3 bread">Events</h1>
        </div>
    </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
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
            <p><a href="event.html">Join Event <i class="ion-ios-arrow-forward"></i></a></p>
            </div>
        </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
        <div class="blog-entry d-md-flex align-self-stretch flex-column-reverse">
            <a href="blog-single.html" class="block-20 align-self-end" style="background-image: url('{{asset('genius/images/event-2.jpg')}}');">
            </a>
            <div class="text p-4 d-block">
            <div class="meta mb-3">
                <div><a href="#">Sep. 10, 2018</a></div>
            </div>
            <h3 class="heading mb-4"><a href="#">Intern Bootcamp Meetup 2018</a></h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            <p><a href="event.html">Join Event <i class="ion-ios-arrow-forward"></i></a></p>
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
            <p><a href="event.html">Join Event <i class="ion-ios-arrow-forward"></i></a></p>
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