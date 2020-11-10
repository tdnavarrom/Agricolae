<!--Author: Santiago Pulgarin-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container mb-5">

    <div id="main">

        @include('util.message')

        <div class="row">
            <div class="col-md mt-4">
                <nav aria-label="breadcrumb" id="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">@lang('messages.home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('messages.products')</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    <small>@lang('messages.product_list') - @lang('messages.' . $data['filter'])</small>
                    <hr>
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <h5>@lang('messages.filter_by')</h5>
                <div class="col-md mb-2">
                    <div class="card">
                        <div class="px-3">
                            <div class="ul py-2">
                                <h6>@lang('messages.filter_category')</h6>
                                <div class="li">
                                    <a class="px-2" href="{{ route('product.list_all') }}">@lang('messages.all')</a>
                                </div>
                                <div class="li">
                                    <a class="px-2" href="{{ route('product.list_cat', 'legumes') }}">@lang('messages.legumes')</a>
                                </div>
                                <div class="li">
                                    <a class="px-2" href="{{ route('product.list_cat', 'tubers') }}">@lang('messages.tubers')</a>
                                </div>
                                <div class="li">
                                    <a class="px-2" href="{{ route('product.list_cat', 'veggies') }}">@lang('messages.veggies')</a>
                                </div>
                                <div class="li">
                                    <a class="px-2" href="{{ route('product.list_cat', 'fruits') }}">@lang('messages.fruits')</a>
                                </div>
                                <div class="li">
                                    <a class="px-2" href="{{ route('product.list_cat', 'nuts') }}">@lang('messages.nuts')</a>
                                </div>
                                <div class="li">
                                    <a class="px-2" href="{{ route('product.list_cat', 'cereals') }}">@lang('messages.cereals')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                            <div class="px-3">
                                <div class="ul py-2">
                                    <h6>@lang('messages.filter_rating')</h6>
                                    <div class="li">
                                        <a class="px-2" href="{{ route('product.list_all_best_rating') }}">@lang('messages.filter_rating_best')</a>
                                    </div>
                                    <div class="li">
                                        <a class="px-2" href="{{ route('product.list_all_worst_rating') }}">@lang('messages.filter_rating_worst')</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-md">
                <div class="row">
                    @foreach($data["products"] as $product)
                    <div class="col-md-4 align-items-stretch">
                        <div class="card my-3" id="card_product">
                            <img class="card-img d-flex justify-content-end" id="product_image" src="{{ asset('storage/product_images/'.$product->getImage()) }}" alt="">
                            <div class="card-img-overlay d-flex justify-content-end">
                                <form action="{{ route('wishlist.save', $product->getId()) }}" method="POST">
                                    @csrf
                                    <input type="text" name="title" value="Favorites" hidden />
                                    <button type="submit" class='card-link text-danger like no-border-heart'><i class="fa fa-fw fa-heart"></i></button>
                                </form>
                            </div>
                            <div class="card-body">
                                <h3><a id="no-space-break" href="{{ route('product.show', $product->getId()) }}">{{ $product->getName() }}</a></h3>
                                <h5 class="subtitle">${{ $product->getPrice() }} / @lang('messages.' . $product->getUnits())</h5>
                                <h5 class="subtitle">@lang('messages.score'): {{ $product->getRating() }}</h5>
                            </div> 
                        </div>
                    </div>
                    @endforeach
                    <div class="text-center">
                        {{ $data["products"]->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection