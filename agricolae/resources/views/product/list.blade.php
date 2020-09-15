@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="col-md-12">
        <h1 class="page-header mt-4">
            <small>@lang('messages.product_list') - @lang('messages.' . $data['filter'])</small>
            <hr>
        </h1>
    </div>

    <div class="row">
        @foreach($data["products"] as $product)
        <div class="col-md-3 d-flex align-items-stretch">
            <div class="card my-3">
                <img class="card-img d-flex justify-content-end" id="product_image" src="{{ asset('images/products_images/'.$product->getImage()) }}" alt="">
                <div class="card-img-overlay d-flex justify-content-end">
                    <form action="{{ route('wishlist.save', $product->getId()) }}" method="POST">
                        @csrf
                        <input type="text" name="title" value="Favorites" hidden />
                        <button type="submit" class='card-link text-danger like no-border-heart'><i class="fa fa-fw fa-heart"></i></button>
                    </form>
                </div>
                <div class="card-body">
                    <h3><a id="no-space-break" href="{{ route('product.show', $product->getId()) }}">{{ $product->getName() }}</a></h3>
                    <h5 class="subtitle">${{ $product->getPrice() }} / @lang('messages.' . $product->getUnits() )</h5>
                    <h6 class="subtitle">@lang('messages.soldBy') {{ $product->user->getName()}} {{ $product->user->getLastName() }}</h6>
                </div> 
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection