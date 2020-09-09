<!--Author: Tomas Navarro-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">
    <h1 class="title_name">@lang('messages.product_list') - @lang('messages.' . $data['filter'])</h1>
    <div class="card">
        @include('util.message')

        @foreach($data["products"] as $product)

        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ route('product.admin_show', $product->id) }}">
                                <b class="small_title_main float-left">{{ $product->id }}: {{ $product->name }}</b>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <p class="small_title float-left ml-3 mt-1">@lang('messages.category'): {{ $product->category }}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="small_title float-left ml-3 mt-1">@lang('messages.reviews'): {{ $product->reviews->count() }}</p>
                        </div>
                    </div>

                </div>

                <div class="col-4">
                    <div class="row justify-content-md-center">
                        <div class="col">
                            <form action="{{ route('product.delete', $product->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <input class='small_red_button' type='submit' value="@lang('messages.delete')" />
                            </form>
                        </div>
                        <div class="col">
                            <a href=""><button class="small_blue_button">@lang('messages.edit')</button></a>
                        </div>
                        <div class="col">
                            <a href="{{ route('product.show', $product->id) }}"><button class="small_green_button">@lang('messages.view')</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection