<!--Author: Tomas Navarro-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<br>

<div class="container col-md-10 justify-content-center">
    <div class="row">
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
        </div>
        <div class="col-md-4">
            <h1 class="title_name"'>Reviews</h1>

            <div class="container mt-2 mb-2">
                @foreach($data['product']->reviews as $review)
                    <div class="card mt-2 mb-2">
                        <div class="card-header">
                            <h2 style='display:inline'>{{ $review->title }}</h2>
                        </div>
                        <div class="card-body">
                            <b class='subltitle'>@lang('messages.review_score'): {{ $review->score }}</b>
                            <p>{{ $review->description }}</p>
                        </div>
                    </div>
                @endforeach

                <div class="mb-2">
                    <a href="{{ route('review.create', $data['product']->id) }}"> <button id='create_review'>@lang('messages.review_create')</button> </a>
                </div>          
            </div>
        </div>
    </div>
</div>
@endsection