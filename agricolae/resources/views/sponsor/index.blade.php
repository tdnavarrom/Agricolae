<!--Author: Santiago Pulgarin-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">

    <div id="main">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header mt-4">
                    <small> Sponsors</small>
                    <hr>
                </h1>
            </div>
        </div>

        <div class="col-md">
        <div class="col-md-12">
                <h1 class="page-header mt-4">
                    <small><a id="no-space-break" href="{{ $data['sponsors']['link'] }}">Babalao - Best Computer Products</a></small>
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