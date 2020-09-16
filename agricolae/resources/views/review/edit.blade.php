<!--Author: Santiago Pulgarin-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="col-md">

                <h1 class="page-header pt-4">
                    <small>@lang('messages.review_edit')</small>
                    <hr>
                </h1>

            </div>

            <div class="card">
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form method="POST" action="{{ route('review.update', $data['review']->getId()) }}">
                    @csrf

                    <div class="form-group">
                        <label for="review_title"> @lang('messages.review_title') </label>
                        <input type="text" class='form-control' id='name_product' name="title" value="{{ $data['review']->getTitle() }}" minlength="8" maxlength="40" />
                    </div>

                    <div class="form-group">
                        <label for="description">@lang('messages.review_description')</label>
                        <textarea class="form-control" rows="3" id='description' name="description" minlength="20" maxlength="256">{{ $data['review']->getDescription() }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="Score">@lang('messages.review_score')</label>
                        <input type="number" id='score' class='form-control' name="score" placeholder="{{ $data['review']['score'] }}" value="{{ $data['review']['score'] }}"  min="1" max="5"/>
                    </div>

                    <button type="submit" class='btn btn-primary btn-lg btn-block' id="button_style1">@lang('messages.edit')</button>


                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection