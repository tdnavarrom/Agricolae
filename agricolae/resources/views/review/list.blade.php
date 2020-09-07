@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-bold"> Review List </div>
                @include('util.message')
                <div class="card-body">

                   @foreach($data["reviews"] as $review)
                        <div class="card-header card-header-normal" style="position:relative;">

                            @if($loop->index==0 || $loop->index==1 )
                                <a style="font-weight:bold; color:darkblue; display:inline; text-decoration: underline;" href="list/{{ $review->id }}">{{$review->id}}</a>
                                <b style="position: absolute; left:10%; display:inline;">{{ $review->title }}</b>
                                <b class="score" style="display:inline; color:darkblue">Score: {{ $review->score }}</b>
                            @else
                                <a style="color:darkcyan; display:inline;" href="list/{{ $review->id }}">{{$review->id}}</a>
                                <p style="position: absolute; left:10%; display:inline;">{{ $review->title }}</p>
                                <p class="score" style="display:inline; color:darkcyan">Score: {{ $review->score }}</p>
                            @endif
                        </div>
                        <br>
                   @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
