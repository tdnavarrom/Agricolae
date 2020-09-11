@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">
    <h1 class="title_name">@lang('messages.product_list') - @lang('messages.' . $data['filter'])</h1>
    <div class="row">

        @foreach($data["products"] as $product)
        <div class="col-sm-12 col-lg-3">

            <div class="card">
                <h1 class="subtitle">{{ $product->price }}$ </h1>
                <a href="{{ route('product.show', $product->id) }}"><button class='black_button'>{{$product->name}}</button></a>
            </div>

        </div>
        @endforeach
    </div>
</div>
@endsection