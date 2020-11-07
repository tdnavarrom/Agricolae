<!--Author: Santiago Pulgarin-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">

    @include('util.message')
    <div class="col-md-12">
        <h1 class="page-header mt-4">
            <small>@lang('messages.wishlist_list')</small>
            <hr>
        </h1>
    </div>

    <div class="row">

        @if (count($data["wishlists"]) > 0)

            @foreach($data["wishlists"] as $wishlist)
            <div class="col-md-3">

                <div class="card my-3" id="card_product">
                    <div class="card-body">
                        <img class="card-img d-flex justify-content-end" id="product_image" src="{{ asset('storage/product_images/'.$wishlist->product->getImage()) }}" alt="">
                        <h3><a href="{{ route('product.show', $wishlist->product->getId()) }}">{{ $wishlist->product->getName() }}</a></h3>
                        <h6 class="subtitle">@lang('messages.soldBy'): {{ $wishlist->product->user->getName()}} {{ $wishlist->product->user->getLastName() }}</h6>
                        <hr>
                        <form action="{{ route('wishlist.delete', $wishlist->getId()) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-primary btn-block" id="button_style1"><i class="fa fa-fw fa-trash-alt"></i></button>
                        </form>
                    </div>
                </div>

            </div>
            @endforeach
        @else
            <div class="col-md mt-4">
                <div class="text-center" id="wishlist">
                    <img src="{{ asset('storage/various_images/wishlist_vacio.png') }}" alt="">
                    <h3><small>@lang('messages.empty_wishlist')</small></h3>
                </div>
            </div>
        @endif
        
    </div>
</div>
@endsection