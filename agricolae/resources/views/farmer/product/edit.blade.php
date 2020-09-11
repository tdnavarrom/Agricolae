@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">@lang('messages.product_edit')</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form method="POST" action="{{ route('farmer.product.update', $data['product']->id) }}">
                    @csrf

                    <div class="form-group">
                        <label for="name_product">@lang('messages.product_name')</label>
                        <input type="text" minlength="8" maxlength="40" class='form-control' id='name_product' name="name" placeholder="{{ $data['product']->name }}" value="{{ $data['product']->name }}" />
                    </div>

                    <div class="form-group">
                        <label for="description">@lang('messages.product_description')</label>
                        <textarea class="form-control" minlength="128" maxlength="256" rows="3" id='description' name="description" placeholder="{{ $data['product']->description }}" value="{{ $data['product']->description }}" ></textarea>
                    </div>

                    <div class="form-group">
                        <label for="category_product">@lang('messages.product_category')</label>
                        <select type="text" class='form-control' id='category_product' name="category" value="{{ $data['product']->category }}">
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
                            <input type="number" min='0' id='product_price' class='form-control' name="price" placeholder="{{ $data['product']->price }}"   value="{{ $data['product']->price }} />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="product_units">@lang('messages.product_units')</label>
                            <input type="number" min='1' id='product_units' class='form-control' name="units" placeholder="{{ $data['product']->units }}"  value="{{ $data['product']->units }}"  />
                        </div>
                    </div>

                    <button type="submit" class='green_button'>@lang('messages.edit')</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
