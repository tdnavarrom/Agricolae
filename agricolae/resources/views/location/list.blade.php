<!--Author: Santiago Pulgarin-->

@extends('layouts.master')

@section('content')
    <div class="container">
        
        @include('util.message')
        <div class="row">
            <div class="col-md">
                <h1 class="page-header mt-4">
                    <small>Mis direcciones</small>
                </h1>
                <hr>
            </div>
            <div class="col-md-1">
                <a href="{{ route('location.create') }}" class="btn btn-primary mt-4 btn-lg btn-block" id="button_style1"><i class="fa fa-fw fa-plus"></i></a>
            </div>
        </div>

        @if (!empty($data["locations"]))
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @foreach($data["locations"] as $location)
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
        @endif

    </div>
@endsection