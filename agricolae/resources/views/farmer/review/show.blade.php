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
                            <p class="subtitle">{{ $data["review"]->created_at }}</p>
                            <b class="subtitle-b">@lang('messages.updated_at'):</b> 
                            <p class="subtitle">{{ $data["review"]->updated_at }}</p>

                        </div>
                        <div class="col">
                            <b class="subtitle-b">@lang('messages.user'):</b>
                            <p class="subtitle"> {{ $data["user"]->getEmail() }}</p>
                            <b class="subtitle-b">@lang('messages.review_description'):</b>
                            <p class="subtitle"> {{ $data["review"]->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
