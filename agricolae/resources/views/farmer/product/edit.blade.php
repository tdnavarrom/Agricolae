<!--Author: Santiago Pulgarin-->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container mt-2">

    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
            <nav aria-label="breadcrumb" id="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">@lang('messages.home')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('farmer.index') }}">@lang('messages.dashboard')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('farmer.product.list') }}">@lang('messages.product_list')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('messages.product_edit')</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="col-md">

                <h1 class="page-header">
                    <small>@lang('messages.product_edit')</small>
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

                <form method="POST" action="{{ route('farmer.product.update', $data['product']->getId()) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name_product">@lang('messages.product_name')</label>
                        <input type="text" class='form-control' id='name_product' name="name" value="{{ $data['product']->getName() }}" minlength="4" maxlength="40" required/>
                    </div>

                    <div class="form-group">
                        <label for="description">@lang('messages.product_description')</label>
                        <textarea class="form-control" rows="3" id='description' name="description" minlength="20" maxlength="256" required>{{ $data['product']->getDescription() }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="category_product">@lang('messages.product_category')</label>
                        <select type="text" class='form-control' id='category_product' name="category">
                            <option value='veggies'>@lang('messages.veggies')</option>
                            <option value='tubers'>@lang('messages.tubers')</option>
                            <option value='legumes'>@lang('messages.legumes')</option>
                            <option value='fruits'>@lang('messages.fruits')</option>
                            <option value='nuts'>@lang('messages.nuts')</option>
                            <option value='cereals'>@lang('messages.cereals')</option>
                        </select>
                        <script>
                            document.getElementById('category_product').value="{{ $data['product']->getCategory() }}"
                        </script>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="product_price">@lang('messages.product_price')</label>
                            <input type="number" id='product_price' class='form-control' name="price" value="{{ $data['product']->getPrice() }}" min='1' required/>
                        </div>

                        <div class="form-group col-md">
                            <label for="product_units">@lang('messages.product_units')</label>
                            <select type="text" class="form-control" id="units_product" name="units" value="{{ $data['product']->getUnits() }}">
                                <option value="kilogram">@lang('messages.kilogram')</option>
                                <option value="pound">@lang('messages.pound')</option>
                                <option value="unit">@lang('messages.unit')</option>
                            </select>
                            <script>
                                document.getElementById('units_product').value="{{ $data['product']->getUnits() }}"
                            </script>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image">@lang('messages.image')</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>

                    <button type="submit" class='btn btn-success btn-block' id="button_style1">@lang('messages.edit')</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
