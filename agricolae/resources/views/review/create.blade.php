@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">Create Review</div>
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
                    <input type="text" placeholder="Enter Title" name="title" value="{{ old('title') }}" />
                    <input type="text" placeholder="Enter Description" name="description" value="{{ old('description') }}" />
                    <input type="number" placeholder="Enter Score" name="score" value="{{ old('score') }}" />
                    <input type="submit" value="Submit" />
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
