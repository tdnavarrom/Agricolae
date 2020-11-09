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
                    <li class="breadcrumb-item"><a href="{{ route('farmer.index') }}">@lang('messages.dashboard')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('messages.product_add')</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="col-md">

                <h1 class="page-header">
                    <small>@lang('messages.product_add')</small>
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

                <form method="POST" action="{{ route('farmer.product.save') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name_product">@lang('messages.product_name')</label>
                        <input type="text" class='form-control' id='name_product' name="name" placeholder="@lang('messages.add_name')"  value="{{ old('name') }}" required minlength="4" maxlength="40"/>
                    </div>

                    <div class="form-group">
                        <label for="description">@lang('messages.product_description')</label>
                        <textarea class="form-control" rows="3" id='description' name="description" placeholder="@lang('messages.add_description')" value="{{ old('description') }}" minlength="20" maxlength="256" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="category_product">@lang('messages.product_category')</label>
                        <select type="text" class='form-control' id='category_product' name="category" value="{{ old('category') }}">
                            <option value='veggies'>@lang('messages.veggies')</option>
                            <option value='tubers'>@lang('messages.tubers')</option>
                            <option value='legumes'>@lang('messages.legumes')</option>
                            <option value='fruits'>@lang('messages.fruits')</option>
                            <option value='nuts'>@lang('messages.nuts')</option>
                            <option value='cereals'>@lang('messages.cereals')</option>
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="product_price">@lang('messages.product_price')</label>
                            <input type="number" id='product_price' class='form-control' name="price" placeholder="@lang('messages.add_price')"  value="{{ old('price') }}" min='1' required/>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="product_units">@lang('messages.product_units')</label>
                            <select type="text" class="form-control" id="units_product" name="units" value="{{ old('units') }}">
                                <option value="kilogram">@lang('messages.kilogram')</option>
                                <option value="pound">@lang('messages.pound')</option>
                                <option value="unit">@lang('messages.unit')</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image">@lang('messages.image')</label>
                        <input type="file" name="image" class="form-control-file" required>
                    </div>

                    <button type="submit" class='btn btn-primary btn-block' id="button_style1">@lang('messages.submit')</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
