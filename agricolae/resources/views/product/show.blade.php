<!--Author: Tomas Navarro-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<br>

<div class="container col-md-10 justify-content-center">
    <div class="container justify-content-md-center col-md-8">
        <div class="card">
            <h1 class="title_name">{{ $data["product"]["name"] }} </h1>

            <img class="card-img d-flex justify-content-end" src="{{ asset('images/products_images/'.$data['product']->getImage()) }}" alt="">
            <div class="d-flex justify-content-end">
                <form action="{{ route('wishlist.save', $data['product']['id']) }}" method="post">
                    @csrf
                    <input type="text" name="title" value="Favorites" hidden />
                    <button type="submit" class='card-link text-danger like no-border-heart'> <i class="fa fa-fw fa-heart"></i></button>
                </form>
            </div>

            <div class="row justify-content-center">
                <div class="col">
                    <p class='subtitle'>@lang('messages.product_price'): {{ $data["product"]["price"] }} $</p>
                </div>
                <div class="col">
                    <h4 style='color:darkcyan; display:inline;'>@lang('messages.product_units'): </h4>
                    <h5 style='display:inline'>{{ $data["product"]["units"] }}</h5>
                </div>
            </div>
            <div class="row justify-content-center">
                <h4 style='color:darkcyan;'>@lang('messages.product_description')</h4>
                <h5>{{ $data["product"]["description"] }}</h5>
            </div>
            <div class='container mt-2 mb-2'>
                <form action="{{ route('product.addToCart',['id'=> $data['product']->getId()]) }}" method="POST">
                    @csrf
                    <div class="row justify-content-center">
                        <label for="quantity">@lang('messages.quantity'):</label>
                        <input type="number" class="form-control" id='quantity' name="quantity" min="1" style="width: 80px;">
                    </div>
                    <button type='submit' class='green_button mt-2'>@lang('messages.add_cart')</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container justify-content-md-center col-md-8">

        <h1 class="title_name"'>@lang(' messages.reviews')</h1> <div class="row justify-content-md-center mt-4 mb-4">
            <div class="col-md-4">
                <a href="{{ route('review.create', $data['product']->id) }}"> <button class='green_button'>@lang('messages.review_create')</button> </a>
            </div>

    </div>


    <div class="row">
        @foreach($data['product']->reviews as $review)
        <div class="col-md-8 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h2 style='display:inline'>{{ $review->getTitle() }}</h2>
                </div>
                <div class="card-body">
                    <b class='subltitle'>@lang('messages.review_score'): {{ $review->getScore() }}</b>
                    <p>{{ $review->getDescription() }}</p>
                </div>
                @if (Auth::user())
                @if (Auth::user()->getId() == $review->getUserId())
                <div class="card-footer">
                    <div class="row justify-content-md-center mt-4 mb-4 ml-2 mr-2s">
                        <div class="col ml-1">
                            <a href="{{ route('review.edit', $review->getId()) }}"> <button class='blue_button'>@lang('messages.edit')</button> </a>
                        </div>
                        <div class="col mr-1">
                            <form action="{{ route('review.delete', $review->getId()) }}" method="POST">
                                @method('delete')
                                @csrf
                                <input class='red_button' type='submit' value="@lang('messages.delete')" />
                            </form>
                        </div>
                    </div>
                </div>
                @endif
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection