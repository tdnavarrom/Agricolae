<!--Author: Tomas Navarro-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1 class="title_name">{{ $data["product"]["name"] }} </h1>
                <div class="row">
                    <div class="col">
                        <p class='subtitle'>@lang('messages.product_price'): {{ $data["product"]["price"] }} $</p>
                    </div>
                    <div class="col">
                        <h4 style='color:darkcyan; display:inline;'>@lang('messages.product_units'): </h4>
                        <h5 style='display:inline'>{{ $data["product"]["units"] }}</h5>
                    </div>  
                </div>   
                <h4 style='color:darkcyan;'>@lang('messages.product_description')</h4>
                <h5>{{ $data["product"]["description"] }}</h5>
                <p style='padding-top:2%;'><button>@lang('messages.add_cart')</button></p>
            </div>

            <h1 class="title_name"'>Reviews</h1>

            <div class="container">
                @foreach($data['product']->reviews as $review)
                    <div class="card">
                        <div class="card-header">
                            <b class='subtitle score'>Score: {{ $review->score }}</b>
                            <h1 style='display:inline'>{{ $review->title }}</h1>
                        </div>
                        <div class="card-body">
                            <p>{{ $review->description }}</p>
                        </div>
                    </div>
                    <br>
                @endforeach                

            </div>
        </div>
    </div>
</div>
@endsection