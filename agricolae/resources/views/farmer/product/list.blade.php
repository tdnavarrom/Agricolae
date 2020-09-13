<!--Author: Tomas Navarro-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">

    @if ($message = Session::get('success'))
        <div class="col-md-12 mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>{{ $message }} </strong>
            </div>
        </div>
    @endif
    <div class="col-md-12">
        <h1 class="page-header mt-4">
            <small>@lang('messages.product_list') - @lang('messages.' . $data['filter'])</small>
            <hr>
        </h1>
    </div>

    <div class="row">
        @foreach($data["products"] as $product)
        <div class="col-md-4 d-flex align-items-stretch">
            <div class="card my-3">
                <img class="card-img d-flex justify-content-end" src="{{ asset('images/products_images/'.$product->getImage()) }}" alt="" id="product_image">
                <div class="card-img-overlay d-flex justify-content-end">
                    <a href="" class="card-link text-danger like">
                        <i class="fa fa-fw fa-heart"></i>
                    </a>
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{ $product->name }}</h4>
                    <h6>@lang('messages.category'): {{ $product->category }}</h6>
                    <h6>@lang('messages.reviews'): {{ $product->reviews->count() }}</h6>
                </div>
                <hr>
                <div class="col-md pb-4">
                    <div class="row">
                        <div class="col-md">
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary btn-block" id="button_style1">@lang('messages.view')</a>
                        </div>
                        <div class="col-md">
                            <a href="{{ route('farmer.product.edit', $product->id) }}" class="btn btn-primary btn-block" id="button_style1">@lang('messages.edit')</a>
                        </div>
                        <div class="col-md">
                            <form action="{{ route('farmer.product.delete', $product->id) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button class="btn btn-primary btn-block" id="button_style1" type="submit">@lang('messages.delete')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
</div>
@endsection