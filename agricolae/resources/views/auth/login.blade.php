@extends('layouts.master')

@section("title", "Login")

@section('content')
<div class="container my-4">
    
    <div class="col-md-12">
        <h1 class="page-header pt-4" id="login_msg">
            <small>@lang('messages.loginMessage')</small>
            Agricolae 
            <hr>
        </h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group justify-content-start">
                            <label for="email" class="col-md-4 col-form-label">@lang('messages.email')</label>

                            <div class="col-md">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group justify-content-start">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" value="{{ old('remember') ? 'checked' : '' }}">

                                    <label class="form-check-label" for="remember">
                                        @lang('messages.rememberMe')
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group justify-content-start">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary" id="button_style1">
                                    @lang('messages.login')
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="pl-3" href="{{ route('password.request') }}">
                                        @lang('messages.forgotPassword')
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <form method="GET" action="{{ route('register') }}">
                    @csrf

                    <div class="card-header">
                        <label for="text">@lang('messages.registerInvitation')</label>    
                    </div>

                    <div class="card-body">
                        <p>@lang('messages.registerInvitationMessage')</p>
                        <button type="submit" class="btn btn-primary btn-block" id="button_style1">@lang('messages.registerInvitationButton')</button>
                    </div>

                </form>    
            </div>    
        </div>
    </div>
</div>
@endsection
