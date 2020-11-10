<!--Author: Santiago Pulgarin-->

@extends('layouts.master')

@section('content')

    <div class="container mb-5">

        <div class="col-md mt-4">
            <nav aria-label="breadcrumb" id="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">@lang('messages.home')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('order.list') }}">@lang('messages.myOrders')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('messages.order_number') {{ $data["order"]->getId() }}</li>
                </ol>
            </nav>
        </div>

        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>@lang('messages.order_number') {{ $data["order"]->getId() }} - @lang('messages.order_date') {{ $data["order"]->getDate() }}</h4>
                        </div>
                        <div class="col-md text-right">
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
            <div class="my-3">
                <form action="{{ route('product.generateFile', $data['order']->getId()) }}" method="POST">
                    @csrf
                    <select type="text" class='form-control' name="format_choice">
                        <option value="pdf">Pdf</option>
                        <option value="excel">Excel</option>
                    </select>
                    <button type="submit" class="btn btn-primary mt-3 btn-lg btn-block" id="button_style1">@lang('messages.pdf-generate')</button>
                </form>
            </div>
        </div>
    </div>

@endsection