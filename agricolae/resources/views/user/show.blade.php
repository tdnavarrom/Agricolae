<!--Author: Santiago Pulgarin-->

@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            
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
                <div class="col-md">
                    <div class="card">
                        <div class="card-body" id="name">
                            <div class="row pr-4">
                                <div class="col">
                                    <h5 class="card-title">@lang('messages.userName')</h5>
                                    <p class="card-text">{{ $user->name }}</p>
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
                                    <p class="card-text">{{ $user->last_name }}</p>
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
                                    <p class="card-text">{{ $user->cell_phone }}</p>
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
                                    <p class="card-text">{{ $user->user_type }}</p>
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
                            <p class="card-text">{{ $user->email }}</p>
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

            <a href="{{ route('user.edit') }}" class="btn btn-primary btn-lg btn-block" id="updateAccount_button">@lang('messages.editButton')</a>

        </div>
    </div>
</div>
@endsection