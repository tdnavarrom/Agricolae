<!--Author: Carlos Daniel Mesa-->

@extends('layouts.master')

@section('content')
<div class="container-fluid px-0 py-0">
    <div class="inner-container">
        <h1>@lang('messages.phrase')</h1>
        <p class="text">
            @lang('messages.description')
        </p>
        <div class="added">
            <span>@lang('messages.start')</span>
            <span>@lang('messages.indicator')</span>
        </div>
    </div>
    <img class="d-block img-fluid" src="{{ asset('storage/various_images/campesino-slide0.jpg') }}" alt="img">
    <div class="row mt-5">
        <div class="col-md px-0" id="about_ubication">
            <h1 id="about_map">@lang('messages.where')</h1>
        </div>
        <div class="col-md px-0">
            @map([
                'lat' => 6.2518400,
                'lng' => -75.5635900,
                'zoom' => 6,
                'markers' => [
                    [
                        'title' => 'Agricolae',
                        'lat' => 6.2518400,
                        'lng' => -75.5635900,
                        'icon' => 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
                        'icon_size' => [20, 32],
                        'icon_anchor' => [0, 32],
                    ],
                ],
            ])
        </div>
    </div>
</div>
@endsection