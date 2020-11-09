<!--Author: Santiago Pulgarin-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
            <nav aria-label="breadcrumb" id="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">@lang('messages.home')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('location.list') }}">@lang('messages.my_location')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('messages.create_location')</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">

        <div class="col-md">
            <h1 class="page-header">
                <small>@lang('messages.create_location')</small>
                <hr>
            </h1>
        </div>

        <div class="card">
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form method="POST" action="{{ route('location.save') }}">
                    @csrf

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md">
                                <label for="name_product">@lang('messages.street_name')</label>
                                <input type="text" class='form-control' id='name_product' name="street_name" placeholder="@lang('messages.add_street_name')"  value="{{ old('name') }}" required minlength="2" maxlength="30" required/>
                            </div>
                            <div class="col-md-5">
                                <label for="name_product">@lang('messages.street_number')</label>
                                <input type="text" class='form-control' id='name_product' name="street_number" placeholder="@lang('messages.add_street_number')"  value="{{ old('name') }}" required minlength="2" maxlength="30" required/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="category_product">@lang('messages.city')</label>
                                <select type="text" class='form-control' id='category_product' name="city" value="{{ old('category') }}">
                                    <option>Bogota</option>
                                    <option>Medellin</option>
                                    <option>Barranquilla</option>
                                    <option>Cali</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="category_product">@lang('messages.state')</label>
                                <select type="text" class='form-control' id='category_product' name="state" value="{{ old('category') }}">
                                    <option>Cundinamarca</option>
                                    <option>Antioquia</option>
                                    <option>Atlantico</option>
                                    <option>Valle del Cauca</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category_product">@lang('messages.country')</label>
                        <select type="text" class='form-control' id='category_product' name="country" value="{{ old('category') }}">
                            <option>Colombia</option>
                        </select>
                    </div>

                    <button type="submit" class='btn btn-primary btn-block' id="button_style1">@lang('messages.submit')</button>
                </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection