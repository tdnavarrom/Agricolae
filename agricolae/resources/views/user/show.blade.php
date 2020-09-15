<!--Author: Santiago Pulgarin-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">

    @if ($message = Session::get('success'))
        <div class="col-md-12 mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>{{ $message }} </strong>
            </div>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <div class="container">
                <div class="row">
                    <div class="col-md">
                        <h1 class="page-header pt-4">
                            <small>@lang('messages.personalInfo')</small>
                        </h1>
                        <hr>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 ml-4">
                    <img src="{{ asset('images/users_images/'.$data['user']->getImage()) }}" alt="" class="avatar">
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body" id="name">
                            <div class="row pr-4">
                                <div class="col">
                                    <h5 class="card-title">@lang('messages.userName')</h5>
                                    <p class="card-text">{{ $data["user"]->getName() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body" id="last_name">
                            <div class="row pr-4">
                                <div class="col">
                                    <h5 class="card-title">@lang('messages.lastName')</h5>
                                    <p class="card-text">{{ $data["user"]->getLastName() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <br>

            <div class="row">
                <div class="col-md">
                    <div class="card">
                        <div class="card-body" id="cell_phone">
                            <div class="row pr-4">
                                <div class="col">
                                    <h5 class="card-title">@lang('messages.cellPhone')</h5>
                                    <p class="card-text">{{ $data["user"]->getCellPhone() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body" id="user_type">
                            <div class="row pr-4">
                                <div class="col">
                                    <h5 class="card-title">@lang('messages.userType')</h5>
                                    <p class="card-text">@lang('messages.' . $data["user"]->getType())</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="card">
                <div class="card-body" id="email">
                    <div class="row pr-4">
                        <div class="col">
                            <h5 class="card-title">@lang('messages.email')</h5>
                            <p class="card-text">{{ $data["user"]->getEmail() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="card">
                <div class="card-body" id="password">
                    <div class="row pr-4">
                        <div class="col">
                            <h5 class="card-title">@lang('messages.password')</h5>
                            <p class="card-text">*******</p>
                        </div>
                    </div>
                </div>
            </div> 

            <br>

            <a href="{{ route('user.edit') }}" class="btn btn-primary btn-lg btn-block" id="button_style1">@lang('messages.editButton')</a>

        </div>
    </div>
</div>
@endsection