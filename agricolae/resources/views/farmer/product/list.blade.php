<!--Author: Santiago Pulgarin-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">

    @include('util.message')
    <div class="col-md-12">
        <h1 class="page-header mt-4">
            <small>@lang('messages.product_list') - @lang('messages.' . $data['filter'])</small>
            <hr>
        </h1>
    </div>

    <div class="row">
        @foreach($data["products"] as $product)
        <div class="col-md-4 align-items-stretch">
            <div class="card my-3" id="card_product">
                <img class="card-img d-flex justify-content-end" src="{{ asset('images/products_images/'.$product->getImage()) }}" alt="" id="product_image">
                <div class="card-img-overlay d-flex justify-content-end">
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{ $product->name }}</h4>
                    <h6>@lang('messages.category'): @lang('messages.' . $product->getCategory())</h6>
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
    
</div>
@endsection