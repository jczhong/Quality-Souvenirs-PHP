@extends('layouts.root')

@section('title', 'Product Detail')

@section('content')
    <div class="row mt-4">
        <div class="col-4">
            <img width="300" height="400" src="{{ asset($souvenir->PathOfImage) }}" />
        </div>
        <div class="col">
            <div>
                <h3 class="pb-2">{{ $souvenir->Name }}</h3>
                <h4 class="pt-2 pb-2 font-weight-bold">{{ '$'.$souvenir->Price }}</h4>
                <p class="pt-2">{{ $souvenir->Description }}</p>
            </div>
            <div>
                <button id="{{ 'AddToCart-'.$souvenir->id }}" value="1" type="button" class="btn btn-success">Add to Cart</button>
            </div>
        </div>
    </div>
@endsection