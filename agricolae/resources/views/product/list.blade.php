@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container">

                <h4 style='font-weight:bold; color:#08dd61'>@lang('messages.product_list')</h4>

                @include('util.message')

                <div class="container">
                    
                    @foreach($data["products"] as $product)
                        <div class="card-header card-header-normal" style="position:relative;">
                            <a class="product_name" href="{{ route('product.show', $product->id) }}">{{$product->name}} </a>
                        </div>

                        <div class="card-body card-body-normal">
                            <b class="score" style="display:inline; color:darkcyan">@lang('messages.product_price'): {{ $product->price }}</b>
                        </div>
                       <br>
                    @endforeach
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection