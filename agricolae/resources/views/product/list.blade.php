@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">
    <h1 class="title_name">@lang('messages.product_list') - @lang('messages.' . $data['filter'])</h1>
    <div class="row">

        @foreach($data["products"] as $product)
        <div class="col-sm-12 col-lg-3">

            <div class="card">
                <img class="card-img d-flex justify-content-end" src="{{ asset('images/products_images/'.$product->getImage()) }}" alt="">
                <div class="d-flex justify-content-end">
                    <form action="{{ route('wishlist.save', $product->getId()) }}" method="post">
                        @csrf
                        <input type="text" name="title" value="Favorites" hidden />
                        <button type="submit" class='card-link text-danger like no-border-heart'><i class="fa fa-fw fa-heart"></i></button>
                    </form>
                </div>
                <h1 class="subtitle">{{ $product->price }}$ </h1>
                <a href="{{ route('product.show', $product->getId()) }}"><button class='black_button'>{{ $product->getName() }}</button></a>
            </div>

        </div>
        @endforeach
    </div>
</div>
@endsection