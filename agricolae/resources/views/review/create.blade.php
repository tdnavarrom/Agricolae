@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">@lang('messages.review_add')</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form method="POST" action="{{ route('review.save', $data['product']->id) }}">
                    @csrf

                    <div class="form-group">
                        <label for="review_title"> @lang('messages.review_title') </label>
                        <input type="text" minlength="8" maxlength="40" class='form-control' id='name_product' name="title" placeholder="@lang('messages.add_title')"  value="{{ old('title') }}" />
                    </div>

                    <div class="form-group">
                        <label for="description">@lang('messages.review_description')</label>
                        <textarea class="form-control" minlength="128" maxlength="256" rows="3" id='description' name="description" placeholder="@lang('messages.add_description')" value="{{ old('description') }}"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="Score">@lang('messages.review_score')</label>
                        <input type="number" id='score' class='form-control' name="score" placeholder="@lang('messages.add_score')"  min="1" max="5" value="{{ old('score') }}" />
                    </div>

                    <button type="submit" class='green_button'>@lang('messages.submit')</button>


                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
