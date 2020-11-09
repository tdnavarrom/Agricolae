<!--Author: Santiago Pulgarin-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">

    @include('util.message')

    <div class="row">
        <div class="col-md mt-4">
            <nav aria-label="breadcrumb" id="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">@lang('messages.home')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('farmer.index') }}">@lang('messages.dashboard')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('messages.product_list')</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                <small>@lang('messages.product_list')</small>
                <hr>
            </h1>
        </div>
    </div>

    @if (count($data["products"]) > 0)
    <div class="row">
        @foreach($data["products"] as $product)
        <div class="col-md-4 align-items-stretch">
            <div class="card my-3" id="card_product">
                <img class="card-img d-flex justify-content-end" src="{{ asset('storage/product_images/'.$product->getImage()) }}" alt="" id="product_image">
                <div class="card-img-overlay d-flex justify-content-end">
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{ $product->name }}</h4>
                    <h6>@lang('messages.category'): @lang('messages.' . $product->getCategory())</h6>
                    <h6>@lang('messages.score'): {{ $product->getRating() }}</h6>
                    <h6>@lang('messages.reviews'): {{ $product->reviews->count() }}</h6>
                </div>
                <hr>
                <div class="row mx-2 mb-3">
                    <div class="col-md my-1">
                        <a href="{{ route('farmer.product.show', $product->id) }}" class="btn btn-primary btn-block" id="button_style1"><i class="fa fa-fw fa-eye"></i></a>
                    </div>
                    <div class="col-md my-1">
                        <a href="{{ route('farmer.product.edit', $product->id) }}" class="btn btn-primary btn-block" id="button_style1"><i class="fa fa-fw fa-edit"></i></a>
                    </div>
                    <div class="col-md my-1">
                        <form action="{{ route('farmer.product.delete', $product->id) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-primary btn-block" id="button_style1" type="submit"><i class="fa fa-fw fa-trash-alt"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="col-md mt-4">
        <div class="text-center" id="wishlist">
            <img src="{{ asset('storage/various_images/product_vacio.png') }}" alt="">
            <h3><small>@lang('messages.empty_product')</small></h3>
        </div>
    </div>
    @endif

    {{ $data["products"]->links() }}
    
</div>
@endsection