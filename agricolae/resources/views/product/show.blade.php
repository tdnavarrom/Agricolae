<!--Author: Tomas Navarro-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 my-5">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">{{ $data["product"]->getName() }} </h1>
                    <img class="card-img d-flex justify-content-end" id="product_image_show" src="{{ asset('images/products_images/'.$data['product']->getImage()) }}" alt="">
                    <div class="card-img-overlay d-flex justify-content-end">
                        <form action="{{ route('wishlist.save', $data['product']['id']) }}" method="post">
                            @csrf
                            <input type="text" name="title" value="Favorites" hidden />
                            <button type="submit" class='card-link text-danger like no-border-heart'> <i class="fa fa-fw fa-heart"></i></button>
                        </form>
                    </div>

                    <div class="row text-center">
                        <div class="col-md">
                            <h4>@lang('messages.product_price'): ${{ $data["product"]->getPrice() }}</h4>
                        </div>
                        <div class="col-md">
                            <h4>@lang('messages.product_units'): @lang('messages.' . $data["product"]->getUnits() )</h4>
                        </div>
                    </div>
                    <div class="col-md">
                        <h4 class="ml-2 mt-3">@lang('messages.product_description')</h4>
                        <h5 class="ml-2">{{ $data["product"]->getDescription() }}</h5>
                    </div>
                     <div class='container mt-2 mb-2'>
                          <form action="{{ route('product.addToCart',['id'=> $data['product']->getId()]) }}" method="POST">
                              @csrf
                              <div class="row justify-content-center">
                                  <label for="quantity">@lang('messages.quantity'):</label>
                                  <input type="number" class="form-control" id='quantity' name="quantity" min="1" style="width: 80px;">
                              </div>
                              <button type='submit' class='green_button mt-2'>@lang('messages.add_cart')</button>
                          </form>
                      </div>
                </div>
            </div>
        </div>
        <div class="col-md my-5">
            <div class="row">
                <a href="{{ route('review.create', $data['product']->id) }}"><i class="fa fa-plus-circle ml-3 add_review_icon"></i></a>
                <h1>@lang('messages.reviews')</h1>
            </div>
            
            <div class="row">
                @foreach($data['product']->reviews as $review)    
                <div class="col-md">
                    <div class="card my-3">

                        <div class="card-header">
                            <h2 style='display:inline'>{{ $review->getTitle() }}</h2>
                        </div>
                        <div class="card-body">
                            <b>@lang('messages.review_score'): {{ $review->getScore() }}</b>
                            <p class="d-inline-block" id="description_review">{{ $review->getDescription() }}</p>
                        </div>
                        @if (Auth::user())
                        @if (Auth::user()->getId() == $review->getUserId())
                          <div class="card-footer">
                              <div class="row justify-content-md-center mt-4 mb-4 ml-2 mr-2s">
                                  <div class="col ml-1">
                                      <a href="{{ route('review.edit', $review->getId()) }}"> <button class='blue_button'>@lang('messages.edit')</button> </a>
                                  </div>
                                  <div class="col mr-1">
                                      <form action="{{ route('review.delete', $review->getId()) }}" method="POST">
                                          @method('delete')
                                          @csrf
                                          <input class='red_button' type='submit' value="@lang('messages.delete')" />
                                      </form>
                                  </div>
                              </div>
                          </div>
                        @endif
                        @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection