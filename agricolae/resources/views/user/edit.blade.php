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
                            <small>@lang('messages.updatePersonalInfo')</small>
                        </h1>
                        <hr>
                    </div>
                </div>
            </div>

            <form action="{{ route('user.update') }}" method="POST">

                @csrf

                <div class="card">
                
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">@lang('messages.userName')</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">@lang('messages.lastName')</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ $user->last_name }}">

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">@lang('messages.cellPhone')</label>
                            <input type="text" class="form-control @error('cell_phone') is-invalid @enderror" id="cell_phone" name="cell_phone" value="{{ $user->cell_phone }}">

                            @error('cell_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
            
                        <div class="form-group">
                            <label for="">@lang('messages.email')</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}">
                            
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="">@lang('messages.actualPassword')</label>
                            <input type="password" class="form-control @error('password-current') is-invalid @enderror" id="password-current" name="password-current" placeholder="@lang('messages.actualPasswordPlaceHolder')">

                            @error('password-current')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">@lang('messages.newPassword')</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="@lang('messages.newPasswordPlaceHolder')">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">@lang('messages.newPasswordConfirm')</label>
                                    <input type="password" class="form-control" id="password-confirm" name="password-confirm" placeholder="@lang('messages.newPasswordPlaceHolder')">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <button class="btn btn-primary btn-lg btn-block mt-4" id="updateAccount_button">@lang('messages.updateButton')</button>
            </form>
            
        </div>
    </div>
</div>
@endsection
