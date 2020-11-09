<!--Author: Santiago Pulgarin-->

@extends('layouts.master')

@section('content')
<div class="container">

    @include('util.message')
    <div class="row">
        <div class="col-md">
            <h1 class="page-header mt-4">
                <small>@lang('messages.cart_title')</small>
            </h1>
            <hr>
        </div>
        @if (!empty($data["products"]))
        <div class="col-md-1">
            <a href="{{ route('product.removeCart') }}" class="btn btn-primary mt-4 btn-lg btn-block" id="button_style1"><i class="fa fa-fw fa-trash-alt"></i></a>
        </div>
        @endif
    </div>

    @if (!empty($data["products"]))
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                @foreach($data["products"] as $product)
                <div class="col-md-12">
                    <div class="card my-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <img id="cart_image" src="{{ asset('storage/product_images/'.$product->getImage()) }}" alt="">
                                </div>
                                <div class="col-md">
                                    <div class="col-md">
                                        <h4>{{ $product->getName() }}</h4>
                                        <h6 class="card-subtitle text-muted mb-2">@lang('messages.soldBy'): {{ $product->user->getName()}} {{ $product->user->getLastName() }}</h6>
                                        <h5>${{ $product->getPrice() }} / @lang('messages.' . $product->getUnits())</h5>
                                        <h5>@lang('messages.quantity'): {{ Session::get('products')[$product->getId()] }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <hr>
            <h5>@lang('messages.order_total_price'): ${{ $data["total_price"] }} </h5>
            <div class="row">
                <div class="col">
                    <form action="{{ route('product.buy') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary mt-3 btn-lg btn-block" id="button_style1">@lang('messages.buy')</button>
                    </form>
                </div>
            </div>


        </div>
    </div>
    @else
    <div class="col-md mt-4">
        <div class="text-center" id="wishlist">
            <img src="{{ asset('storage/various_images/carro_vacio.png') }}" alt="">
            <h3><small>@lang('messages.empty_cart')</small></h3>
        </div>
    </div>
    @endif

</div>
@endsection