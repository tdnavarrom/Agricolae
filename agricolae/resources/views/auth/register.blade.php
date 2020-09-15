@extends('layouts.master')

@section("title", "Register")

@section('content')
<div class="container my-4">

    <div class="col-md-12">
        <h1 class="page-header pt-4" id="login_msg">
            <small>@lang('messages.registerMessage')</small>
            Agricolae 
            <hr>
        </h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row justify-content-center">
                            <div class="col-md">

                                <div class="form-group justify-content-start">
                                    <label for="name" class="col-md-4 col-form-label">@lang('messages.userName')</label>

                                    <div class="col-md">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group justify-content-start">
                                    <label for="last_name" class="col-md-4 col-form-label">@lang('messages.lastName')</label>

                                    <div class="col-md">
                                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md">
                                <div class="form-group justify-content-start">
                                    <label for="cell_phone" class="col-md-4 col-form-label">@lang('messages.cellPhone')</label>

                                    <div class="col-md">
                                        <input id="cell_phone" type="text" class="form-control @error('cell_phone') is-invalid @enderror" name="cell_phone" value="{{ old('cell_phone') }}" required autocomplete="cell_phone">

                                        @error('cell_phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>  
                            </div>
                            <div class="col-md">
                                <div class="form-group justify-content-start">
                                    <label for="user_type" class="col-md-4 col-form-label">@lang('messages.userType')</label>

                                    <div class="col-md">
                                        <select class="form-control @error('user_type') is-invalid @enderror" name="user_type">
                                            <option value="client">@lang('messages.userType1')</option>
                                            <option value="farmer">@lang('messages.userType2')</option>
                                        </select>

                                        @error('user_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>  
                            </div>
                        </div>

                        <div class="form-group justify-content-start">
                            <label for="email" class="col-md-4 col-form-label">@lang('messages.email')</label>

                            <div class="col-md">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group justify-content-start">
                            <label for="password" class="col-md-4 col-form-label">@lang('messages.password')</label>

                            <div class="col-md">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group justify-content-start">
                            <label for="password-confirm" class="col-md-4 col-form-label">@lang('messages.confirmPassword')</label>

                            <div class="col-md">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group justify-content-start">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary" id="button_style1">
                                    @lang('messages.register')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
