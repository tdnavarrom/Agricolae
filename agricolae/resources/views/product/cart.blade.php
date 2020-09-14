@extends('layouts.master')



@section('content')


<div class="row" style="margin-top:20px; margin-bottom:20px">
        <div class="col-lg-8 mx-auto">
        <div class="row p-5">
        <div class="col-md-12">
            <ul id="errors">
                @foreach($data["products"] as $product)
                <div class="col-sm-12 col-lg-3">
                    <div class="card">
                        <h1 class="subtitle"> {{ $product->getName() }} - {{ $loop->iteration }}</h1>
                        <a href="{{ route('product.show', $product->getId()) }}"><button class='black_button'>@lang('messages.view_product')</button></a>
                    </div>
                </div>
                @endforeach
                <br /><br />
                Total: precio_total
                <form action="{{ route('product.buy') }}" method="POST">
                @csrf
                <button type="submit">Buy</button>
                </from>
            </ul>
        </div>
    </div>

        </div>
    </div>

@endsection