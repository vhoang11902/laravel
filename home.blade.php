@extends('welcome')
@section('content')
<section id="Slider">
    <div class="Slider_button">
        <a href="{{URL::to('/category')}}">SHOP NOW</a>
    </div>
    <!-- <video autoplay loop muted plays-inline class="back-video">
        <source src="BONDILOUNGE 2 CHAIRS.mp4" type="video/mp4">
    </video> -->
    <div class="aspect-ratio-169">
        <img src="{{asset('public/FrontEnd/img/slide1.jpg')}}">
        <img src="{{asset('public/FrontEnd/img/slide1.jpg')}}">
        <img src="{{asset('public/FrontEnd/img/slide1.jpg')}}">
    </div>
    <div class="dot-container">
        <div class="dot active"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>
</section>
@endsection
