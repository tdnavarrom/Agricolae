<!--Author: Santiago Pulgarin-->

@extends('layouts.master')

@section('content')
    <div class="container">
        
        @include('util.message')

        <div class="row">
            <div class="col-md mt-4">
                <nav aria-label="breadcrumb" id="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">@lang('messages.home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('messages.my_location')</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-md">
                <h1 class="page-header">
                    <small>@lang('messages.my_location')</small>
                </h1>
                <hr>
            </div>
            <div class="col-md-1">
                <a href="{{ route('location.create') }}" class="btn btn-primary mt-1 btn-lg btn-block" id="button_style1"><i class="fa fa-fw fa-plus"></i></a>
            </div>
        </div>

        @if (count($data["locations"]) > 0)
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        @foreach ($data["locations"] as $location)
                            <div class="col-md-12">
                                <div class="card my-2">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md">
                                                <div class="row">
                                                    <h4>{{ $location->getStreetName() }} # {{ $location->getStreetNumber() }} </h4>
                                                </div>
                                                <div class="row">
                                                    <h6>{{ $location->getCity() }} - {{ $location->getState() }} - {{ $location->getCountry() }}</h6>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md">
                                                    <div class="row">
                                                        <a href="{{ route('location.edit', $location->getId()) }}" class="btn btn-primary btn-lg" id="button_style1"><i class="fa fa-fw fa-edit"></i></a>
                                                        <form action="{{ route('location.delete', $location->getId()) }}" method="POST">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary btn-lg ml-2" id="button_style1"><i class="fa fa-fw fa-trash-alt"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @else
            <div class="col-md mt-4">
                <div class="text-center" id="wishlist">
                    <img src="{{ asset('storage/various_images/direcciones_vacio.png') }}" alt="">
                    <h3><small>@lang('messages.empty_location')</small></h3>
                </div>
            </div>                
        @endif

    </div>
@endsection