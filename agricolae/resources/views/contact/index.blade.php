<!--Author: Carlos Daniel Mesa-->

@extends('layouts.master')

@section('content')
<div class="container-fluid mx-0 my-5">
    <img class="rounded mx-auto d-block img-fluid" src="{{ asset('storage/various_images/Campesino-1.1.png') }}" alt="Responsive image">  
    <div class="contact-section">
        <div class="contact-form">
            <h1>@lang('messages.contact_us')</h1>
            <div class="txtb">
                <label>@lang('messages.contact_name')</label>
                <input type="text" name="" value="">
            </div>

        <div class="txtb">
            <label>@lang('messages.email')</label>
            <input type="email" name="" value="">
        </div>

        <div class="txtb">
            <label>@lang('messages.phone')</label>
            <input type="text" name="" value="">
        </div>

        <div class="txtb">
            <label>@lang('messages.message')</label>
            <textarea></textarea>
        </div>
        <a class="button">@lang('messages.send')</a>
        </div>
    </div> 
</div>
@endsection