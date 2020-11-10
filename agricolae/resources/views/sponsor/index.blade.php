<!--Author: Santiago Pulgarin-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container mb-5">
    <div id="main">

        <div class="col-md mt-4">
            <nav aria-label="breadcrumb" id="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">@lang('messages.home')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('messages.sponsors')</li>
                </ol>
            </nav>
        </div>

        <div class="col-md">
            <div class="col-md-12">
                <h1 class="page-header mt-4">
                    <small><a id="no-space-break" href="{{ $data['sponsors']['link'] }}">@lang('messages.babalao_title')</a></small>
                    <hr>
                </h1>
            </div>
            <div class="row">
                @foreach($data["sponsors"]["products"] as $product)
                <div class="col-md-4 align-items-stretch">
                    <div class="card my-3" id="card_product">
                        <img class="card-img d-flex justify-content-end" id="product_image" src="{{ $product['image-src'] }}" alt="">
                        <div class="card-body">
                            <h3><a id="no-space-break" href="{{ $product['link'] }}">{{ $product['name'] }}</a></h3>
                            <h5 class="subtitle">${{ $product['price'] }}</h5>
                            <h5 class="subtitle">{{ $product['brand'] }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection