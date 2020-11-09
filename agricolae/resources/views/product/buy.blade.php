<!--Author: Santiago Pulgarin-->

@extends('layouts.master')

@section('content')

<div class="container">

    <div class="col-md mt-4">
        <nav aria-label="breadcrumb" id="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">@lang('messages.home')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('messages.buy')</li>
            </ol>
        </nav>
    </div>

    <div class="col-md">
        <div class="text-center" id="wishlist">
            <img src="{{ asset('storage/various_images/compra_realizada.png') }}" alt="">
            <h3><small>@lang('messages.purchase_made')</small></h3>
            <form action="{{ route('product.generateFile', $id) }}" method="POST">
                @csrf
                <select type="text" class='form-control' name="format_choice">
                    <option value="pdf">Pdf</option>
                    <option value="excel">Excel</option>
                </select>
                <button type="submit" class="btn btn-primary mt-3 btn-lg btn-block" id="button_style1">@lang('messages.pdf-generate')</button>
            </form>
            <a href="{{ route('home.index') }}" class="btn btn-primary mt-3 btn-lg btn-block" id="button_style1">@lang('messages.exit')</a>
        </div>
    </div>

</div>

@endsection