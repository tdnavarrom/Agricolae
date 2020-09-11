@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="title_name"><b>@lang('messages.review_title'):</b></h4>
                    <h5 class="subtitle"> {{$data["review"]->title }}</h5>
                    
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <b class="subtitle-b">@lang('messages.product_name'):</b>
                            <p class="subtitle"> {{ $data["product"]["name"] }}</p>
                            <b class="subtitle-b">@lang('messages.review_score'):</b>
                            <p class="subtitle"> {{ $data["review"]->score }}</p>
                            <b class="subtitle-b">@lang('messages.created_at'):</b>
                        </div>
                        <div class="col">
                            <b class="subtitle-b">@lang('messages.review_description'):</b>
                            <p class="subtitle"> {{ $data["review"]->description }}</p>
                        </div>
                    </div>
                    <div class="row justify-content-md-center mt-4 mb-4 ml-2 mr-2">
                    <div class="col ml-1">
                        <a href="{{ route('review.edit', $data['review']->id) }}"> <button class='blue_button'>@lang('messages.edit')</button> </a>
                    </div>
                    <div class="col mr-1">
                        <form action="{{ route('review.delete', $data['review']->id) }}" method="POST">
                            @method('delete')
                            @csrf
                            <input class='red_button' type='submit' value="@lang('messages.delete')"/>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection