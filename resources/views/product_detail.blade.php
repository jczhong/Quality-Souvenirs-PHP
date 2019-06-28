@extends('layouts.root')

@section('title', 'Product Detail')

@section('content')
    <div class="row mt-4">
        <div class="col-4">
            <img width="300" height="400" src="{{ asset($product->path_of_name) }}" />
        </div>
        <div class="col">
            <div>
                <h3 class="pb-2">{{ $product->name }}</h3>
                <h4 class="pt-2 pb-2 font-weight-bold">{{ '$'.$product->price }}</h4>
                <p class="pt-2">{{ $product->description }}</p>
            </div>
            <div>
                <button id="{{ 'AddToCart-'.$product->id }}" value="1" type="button" class="btn btn-success">Add to Cart</button>
            </div>
        </div>
    </div>
@endsection