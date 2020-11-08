<!--Author: Santiago Pulgarin-->

@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <h4>@lang('messages.order_placed') {{ $data["order"]->getDate() }}</h4>
                        </div>
                        <div class="col-md">
                            <h4>@lang('messages.order_total') {{ $data["order"]->getTotal() }}</h4>
                        </div>
                    </div>
                    <hr>
                    @foreach ($data["items"] as $items)
                        <div class="row my-2">
                            <div class="col-md">
                                <img id="cart_image" src="{{ asset('storage/product_images/'.$items->product->getImage()) }}" alt="">
                            </div>
                            <div class="col-md-10">
                                <h4>{{ $items->product->getName() }}</h4>
                                <div class="row  pl-3">
                                    <h6 class="card-subtitle text-muted mx-2">Quantity: {{ $items->getQuantity() }}</h6>
                                    <h6 class="card-subtitle text-muted mx-2">Subtotal: ${{ $items->product->getPrice() * $items->getQuantity()}}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach    
                </div>
            </div>
        </div>
    </div>

@endsection