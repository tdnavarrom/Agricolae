<!--Author: Santiago Pulgarin-->

@extends('layouts.master')

@section('content')
<div class="container-fluid mx-0" id="exterior">
    <div class="row justify-content-center">

        <div class="carousel slide" id="carousel-1" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-1" data-slide-to="1"></li>
                <li data-target="#carousel-1" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block img-fluid" src="{{ asset('storage/various_images/campesino-slide0.jpg') }}" alt="img">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="{{ asset('storage/various_images/campesino-slide1.jpg') }}" alt="img">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="{{ asset('storage/various_images/campesino-slide2.jpg') }}" alt="img">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel-1" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#carousel-1" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
        
    </div>
</div>

@map([
    'lat' => 48.134664,
    'lng' => 11.555220,
    'zoom' => 6,
    'markers' => [
        [
            'title' => 'Go NoWare',
            'lat' => 48.134664,
            'lng' => 11.555220,
            'url' => 'https://gonoware.com',
            'icon' => 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
            'icon_size' => [20, 32],
            'icon_anchor' => [0, 32],
        ],
    ],
])
@endsection