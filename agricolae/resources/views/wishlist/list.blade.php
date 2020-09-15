@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">
    <h1 class="title_name">@lang("messages.wishlist_list")</h1>
    <div class="row">

        @foreach($data["wishlists"] as $wishlist)
        <div class="col-sm-12 col-lg-3">

            <div class="card">
                <img class="card-img d-flex justify-content-end" src="{{ asset('images/products_images/'.$wishlist->product->getImage()) }}" alt="">
                <h1 class="subtitle">{{ $wishlist->product->getName() }}</h1>
                <a href="{{ route('product.show', $wishlist->getProductId()) }}"><button class='black_button'>@lang('messages.view_product')</button></a>
            </div>

        </div>
        @endforeach
    </div>
</div>
@endsection