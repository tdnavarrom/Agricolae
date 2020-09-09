@extends('layouts.master')

@section('content')
<div class="container my-4">

    <div class="col-md-12">
        <h1 class="page-header pt-4" id="resetPassword_msg">
            <small>@lang('messages.resetPasswordTitle')</small>
            <hr>
        </h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
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
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    @lang('messages.resetPasswordButton')
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
