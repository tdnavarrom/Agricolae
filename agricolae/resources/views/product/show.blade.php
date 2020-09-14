<!--Author: Tomas Navarro-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<br>

<div class="container col-md-10 justify-content-center">
        <div class="container justify-content-md-center col-md-8">
            <div class="card">
                <h1 class="title_name">{{ $data["product"]["name"] }} </h1>
                <button class='black_button'>@lang('messages.add_wishlist')</button></p>
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
                <p style='padding-top:2%;'> 
                <div class="row">
                    <div class="col">
                        <form action="{{ route('product.addToCart',['id'=> $data['product']->getId()]) }}" method="POST">
                        @csrf
                        <div class="col-md-12">Quantity:
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" name="quantity" min="1" style="width: 80px;">
                        </div>
                        <div class="form-group col-md-12">
                        <button class='black_button'>@lang('messages.add_cart')</button></p>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container justify-content-md-center col-md-8">

            <h1 class="title_name"'>@lang('messages.reviews')</h1>

            <div class="row justify-content-md-center mt-4 mb-4">
                <div class="col-md-4">
                    <a href="{{ route('review.create', $data['product']->id) }}"> <button class='green_button'>@lang('messages.review_create')</button> </a>
                </div>

            </div>
            

            <div class="row">
                @foreach($data['product']->reviews as $review)
                <div class="col-md-8 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h2 style='display:inline'>{{ $review->title }}</h2>
                        </div>
                        <div class="card-body">
                            <b class='subltitle'>@lang('messages.review_score'): {{ $review->score }}</b>
                            <p>{{ $review->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>    
        </div>
</div>
@endsection