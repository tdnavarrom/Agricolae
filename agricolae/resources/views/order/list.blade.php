<!--Author: Santiago Pulgarin-->

@extends('layouts.master')

@section('content')

<div class="container mb-5">

    <div class="row">
        <div class="col-md mt-4">
            <nav aria-label="breadcrumb" id="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">@lang('messages.home')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('messages.myOrders')</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md">
            <h1 class="page-header">
                <small>@lang('messages.my_order')</small>
            </h1>
            <hr>
        </div>
    </div>

    @if (count($data["orders"]) > 0)
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @foreach ($data["orders"] as $orders)
                        <div class="col-md-12">
                            <div class="card my-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <i class="fa fa-clipboard-check" id="order_icon"></i>
                                        </div>
                                        <div class="col-md">
                                            <a href="{{ route('order.show', $orders->getId()) }}"><h4>@lang('messages.order_placed') {{ $orders->getDate() }}</h4></a>
                                            <h4>@lang('messages.order_total'){{ $orders->getTotal() }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="col-md mt-4">
            <div class="text-center" id="wishlist">
                <img src="{{ asset('storage/various_images/order_vacio.png') }}" alt="">
                <h3><small>@lang('messages.empty_order')</small></h3>
            </div>
        </div>
    @endif

</div>

@endsection