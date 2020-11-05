<!--Author: Santiago Pulgarin-->

@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">

            <h1 class="page-header pt-4">
                <small>@lang('messages.welcomeMessage') {{ $data["user"]->getName()}}</small>
                <hr>
            </h1>

        </div>
    </div>
    <div class="row text-center">
        <div class="col-md">

            <div class="card">
                <div class="card-body justify-content-center">
                    <img src="{{ asset('storage/various_images/addProduct_farmer.png') }}" alt="img">
                    <hr>
                    <a href="{{ route('farmer.product.create') }}" class="btn btn-primary" id="button_style1">@lang('messages.product_add')</a>
                </div>
            </div>

        </div>
        <div class="col-md">

            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('storage/various_images/showProduct_farmer.png') }}" alt="img">
                    <hr>
                    <a href="{{ route('farmer.product.list') }}" class="btn btn-primary" id="button_style1">@lang('messages.myProducts')</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection