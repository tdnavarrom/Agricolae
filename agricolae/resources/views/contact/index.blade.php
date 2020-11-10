<!--Author: Carlos Daniel Mesa-->

@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-7">
            
            <div class="card" id="contact_card">
                <div class="card-body">
                
                    <h1 class="page-header text-center mb-5">
                        <small>@lang('messages.contact_us')</small>
                    </h1>

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
                    
                    <a class="btn btn-primary btn-block mt-4" id="button_style1">@lang('messages.send')</a>

                </div>
            </div>
        </div>
        <img class="d-block img-fluid" src="{{ asset('storage/various_images/campesino-slide1.jpg') }}" alt="img">
    </div>
</div>
@endsection