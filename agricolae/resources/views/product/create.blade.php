@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">Create Product</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form method="POST" action="{{ route('product.save') }}">
                    @csrf
                    <input type="text" placeholder="Enter Name" name="name" value="{{ old('name') }}" />
                    <input type="text" placeholder="Enter Description" name="description" value="{{ old('description') }}" />
                    <input type="text" placeholder="Enter category" name="category" value="{{ old('category') }}" />
                    <input type="number" placeholder="Enter Price" name="price" value="{{ old('price') }}" />
                    <input type="number" placeholder="Enter Units" name="units" value="{{ old('units') }}" />
                    <input type="submit" value="Submit" />
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
