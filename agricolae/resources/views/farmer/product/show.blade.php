<!--Author: Santiago Pulgarin-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 my-5">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">{{ $data["product"]->getName() }} </h1>
                    <div class="row">
                        <div class="col-md">
                            <img class="card-img d-flex justify-content-end" id="product_image_show" src="{{ asset('storage/product_images/'.$data['product']->getImage()) }}" alt="">
                        </div>
                        <div class="col-md">
                            <div class="col-md mt-4 justify-content-left">
                                <h5 class='subtitle'> <b>@lang('messages.product_id'):</b> {{ $data["product"]->getId() }}</h5>
                                <h5 class='subtitle'> <b>@lang('messages.product_price'):</b> ${{ $data["product"]->getPrice() }}</h5>
                                <h5 class='subtitle'> <b>@lang('messages.product_units'):</b> @lang('messages.' . $data["product"]->getUnits()) </h5>
                                <h5 class='subtitle'> <b>@lang('messages.score'):</b> {{ $data["product"]->getRating() }} </h5>
                                <h5 class='subtitle'><b>@lang('messages.category'):</b> @lang('messages.' . $data["product"]->getCategory())</h5>
                                <h5 class='subtitle'> <b>@lang('messages.created_at'):</b> {{ $data["product"]->getCreatedAt() }} </h5>
                                <h5 class='subtitle'> <b>@lang('messages.updated_at'):</b> {{ $data["product"]->getUpdatedAt() }} </h5>
                            </div>                        
                        </div>
                    </div>
                    <div class="col-md">
                        <h5 class='subtitle'><b>@lang('messages.product_description'):</b></h5>
                        <h6 class='subtitle'>{{ $data["product"]->getDescription() }}</h6>
                    </div>
                </div>
            </div>    
        </div>
        <div class="col-md my-5">
            <div class="row justify-content-center">
                <h1>@lang('messages.reviews')</h1>
            </div>

            <div class="row">
                @foreach($data['product']->reviews as $review)    
                <div class="col-md">
                    <div class="card my-3">

                        <div class="card-header">
                            <h2>{{ $review->getTitle() }}</h2>
                        </div>

                        <div class="card-body">
                            <b>@lang('messages.review_score'): {{ $review->getScore() }}/5</b>
                            <p id="description_review">{{ $review->getDescription() }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>   
    </div>
</div>
@endsection