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
                    <li class="breadcrumb-item active" aria-current="page">@lang('messages.edit_location')</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">

        <div class="col-md">
            <h1 class="page-header">
                <small>@lang('messages.edit_location')</small>
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

                    <form action="{{ route('location.update', $data['locations']->getId()) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md">
                                    <label for="name_product">@lang('messages.street_name')</label>
                                    <input type="text" class='form-control' id='name_product' name="street_name" value="{{ $data['locations']->getStreetName() }}" required minlength="2" maxlength="30" required/>
                                </div>
                                <div class="col-md-5">
                                    <label for="name_product">@lang('messages.street_number')</label>
                                    <input type="text" class='form-control' id='name_product' name="street_number" value="{{ $data['locations']->getStreetNumber() }}" required minlength="2" maxlength="30" required/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="category_product">@lang('messages.city')</label>
                                    <select type="text" class='form-control' id='city' name="city">
                                        <option>Bogota</option>
                                        <option>Medellin</option>
                                        <option>Barranquilla</option>
                                        <option>Cali</option>
                                    </select>
                                    <script>
                                        document.getElementById('city').value="{{ $data['locations']->getCity() }}"
                                    </script>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="category_product">@lang('messages.state')</label>
                                    <select type="text" class='form-control' id='state' name="state">
                                        <option>Cundinamarca</option>
                                        <option>Antioquia</option>
                                        <option>Atlantico</option>
                                        <option>Valle del Cauca</option>
                                    </select>
                                    <script>
                                        document.getElementById('state').value="{{ $data['locations']->getState() }}"
                                    </script>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category_product">@lang('messages.country')</label>
                            <select type="text" class='form-control' id='country' name="country">
                                <option>Colombia</option>
                            </select>
                            <script>
                                document.getElementById('country').value="{{ $data['locations']->getCountry() }}"
                            </script>
                        </div>

                        <button type="submit" class='btn btn-primary btn-block' id="button_style1">@lang('messages.updateButton')</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection