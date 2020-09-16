<!--Author: Santiago Pulgarin-->

@extends('layouts.master')

@section("title", $data["title"])
 
@section('content')
<div class="container">
    @include('util.message')
    <div class="row">
        <div class="col-md-8 my-5">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">{{ $data["product"]->getName() }} </h1>
                    <img class="card-img d-flex justify-content-end" id="product_image_show" src="{{ asset('images/products_images/'.$data['product']->getImage()) }}" alt="">
                    <div class="card-img-overlay d-flex justify-content-end">
                        <form action="{{ route('wishlist.save', $data['product']['id']) }}" method="post">
                            @csrf
                            <input type="text" name="title" value="Favorites" hidden />
                            <button type="submit" class='card-link text-danger like no-border-heart'> <i class="fa fa-fw fa-heart"></i></button>
                        </form>
                    </div>

                    <div class="col-md">
                        <h4 class="ml-2 mt-3">@lang('messages.product_price'): ${{ $data["product"]->getPrice() }} / @lang('messages.' . $data["product"]->getUnits())</h4>
                    </div>
                    <div class="col-md">
                        <h4 class="ml-2 mt-3">@lang('messages.product_description'):</h4>
                        <h6 class="ml-2">{{ $data["product"]->getDescription() }}</h6>
                    </div>
                    <div class='container mt-4 mb-2'>
                        <form action="{{ route('product.addToCart',['id'=> $data['product']->getId()]) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-2 ml-2">
                                    <input type="number" class="form-control" id='cart_quantity' name="quantity" value="1" min="1">
                                </div>
                                <div class="col-md">
                                    <button type='submit' class='btn btn-primary btn-lg btn-block add_cart_button' id="button_style1">@lang('messages.add_cart')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md my-5">
            <div class="row">
                <a href="{{ route('review.create', $data['product']->id) }}"><i class="fa fa-plus-circle ml-3 add_review_icon"></i></a>
                <h1>@lang('messages.reviews')</h1>
            </div>
            
            <div class="row">
                @foreach($data['product']->reviews as $review)    
                <div class="col-md">
                    <div class="card my-3">

                        <div class="card-header">
                            <h2>{{ $review->getTitle() }}</h2>
                        </div>

                        <div class="card-body">
                            <b>@lang('messages.review_score'): {{ $review->getScore() }}/5</b>
                            <p id="description_review">{{ $review->getDescription() }}</p>
                        @if (Auth::user())
                            @if (Auth::user()->getId() == $review->getUserId())
                                <div class="row">
                                    <a href="{{ route('review.edit', $review->getId()) }}" class="btn btn-primary ml-3" id="button_style1"><i class="fa fa-fw fa-edit"></i></a>
                                    <form action="{{ route('review.delete', $review->getId()) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-primary ml-3" id="button_style1"><i class="fa fa-fw fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            @endif
                        @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection