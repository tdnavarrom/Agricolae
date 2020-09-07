@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <b>{{ $data["review"]["title"] }} </b>
                    <p class="score" style="display:inline;">Score: {{ $data["review"]["score"] }}</p>
                    <form method="POST" action="{{ route('review.delete', $data['review']['id']) }}">
                        @csrf
                        <button type="submit" class="btn btn-default navbar-btn">Delete</button>
                    </form>
                    
                </div>
                <div class="card-body review-list-card-body">
                    <p style="display: inline;">{{ $data["review"]["description"] }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
