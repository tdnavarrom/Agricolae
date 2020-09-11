<!--Author: Tomas Navarro-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<br>

<div class="container col-md-10 justify-content-center">
    <div class="row">
        <div class="container justify-content-md-center col-md-6">
            <div class="card">
                <h4 class="title_name">{{ $data["product"]["name"] }} </h4>
                <div class="row">
                    <div class="col">
                        
                    </div>
                    <div class="col">
                        <h5 class='subtitle'> <b>@lang('messages.product_id'):</b> {{ $data["product"]["id"] }}</h5>
                        <h5 class='subtitle'> <b>@lang('messages.product_price'):</b> {{ $data["product"]["price"] }} </h5>
                        <h5 class='subtitle'> <b>@lang('messages.product_units'):</b> {{ $data["product"]["units"] }} </h5>
                        <h5 class='subtitle'><b>@lang('messages.category'):</b> {{ $data['product']['category'] }}</h5>
                        <h5 class='subtitle'> <b>@lang('messages.created_at'):</b> {{ $data["product"]["created_at"] }} $</h5>
                        <h5 class='subtitle'> <b>@lang('messages.updated_at'):</b> {{ $data["product"]["updated_at"] }} </h5>           
                    </div> 
                </div>
                <div class="container">
                    <h5 class='subtitle'><b>@lang('messages.product_description'):</b></h5>                        
                    <h6 class='subtitle'>{{ $data["product"]["description"] }}</h6>
                </div>
                
                <div class="row justify-content-md-center mt-4 mb-4 ml-2 mr-2">
                    <div class="col ml-1">
                        <a href="{{ route('farmer.product.edit', $data['product']->id) }}"> <button class='blue_button'>@lang('messages.edit')</button> </a>
                    </div>
                    <div class="col">
                        <a href="{{ route('product.show', $data['product']->id) }}"> <button class='green_button'>@lang('messages.view')</button> </a>
                    </div>
                    <div class="col mr-1">
                        <form action="{{ route('farmer.product.delete', $data['product']->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <input class='red_button' type='submit' value="@lang('messages.delete')"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container col-md-6">
            <div class="card">

                @foreach($data['product']->reviews as $review)

                <div class="card-header">
                    <b class="small_title_main float-left">{{ $review->id }}: {{ $review->title }}</b>
                    <p class="small_title float-left ml-3 mt-1">@lang('messages.review_score'): {{ $review->score }}</p>
                    <a href="{{ route('farmer.review.show', [$data['product']->id, $review->id]) }}" class="small_title float-right ml-4 mt-1">@lang('messages.view')</a>
                </div>

                @endforeach

            </div>
        </div>
    </div>  
</div>
@endsection