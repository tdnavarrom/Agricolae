<!--Author: Santiago Pulgarin-->

@extends('layouts.master')

@section('content')
<div class="container mb-5">

    <div class="row">
        <div class="col-md mt-4">
            <nav aria-label="breadcrumb" id="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">@lang('messages.home')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('messages.dashboard')</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md">

            <h1 class="page-header">
                <small>@lang('messages.welcomeMessage') {{ $data["user"]->getName()}}</small>
                <hr>
            </h1>

        </div>
    </div>
    <div class="row text-center">
        <div class="col-md">

            <div class="card">
                <div class="card-body justify-content-center">
                    <img src="{{ asset('storage/various_images/addProduct_farmer.png') }}" alt="img">
                    <hr>
                    <a href="{{ route('farmer.product.create') }}" class="btn btn-primary" id="button_style1">@lang('messages.product_add')</a>
                </div>
            </div>

        </div>
        <div class="col-md">

            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('storage/various_images/showProduct_farmer.png') }}" alt="img">
                    <hr>
                    <a href="{{ route('farmer.product.list') }}" class="btn btn-primary" id="button_style1">@lang('messages.myProducts')</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection