<!--Author: Carlos Daniel Mesa-->

@extends('layouts.master')

@section('content')
<body>
    <div class="about-section">
        <div class="inner-container" style="position: absolute; top: 40%;">
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
    </div>
</body>
@endsection