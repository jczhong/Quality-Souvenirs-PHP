@extends('layouts.management')

@section('management_content')
    <h2>Product Details</h2>

    <div>
        <hr />
        <dl>
            <dt>{{ 'Name' }}</dt>
            <dd>{{ $product->name }}</dd>
            <dt>{{ 'Description' }}</dt>
            <dd>{{ $product->description }}</dd>
            <dt>{{ 'Price' }}</dt>
            <dd>{{ $product->price }}</dd>
            <dt>{{ 'Popularity' }}</dt>
            <dd>{{ $product->popularity }}</dd>
            <dt>{{ 'Image File' }}</dt>
            <dd>{{ $product->path_of_image }}</dd>
            <dt>{{ 'Category' }}</dt>
            <dd>{{ $product->category->name }}</dd>
            <dt>{{ 'Supplier' }}</dt>
            <dd>{{ $product->supplier->name }}</dd>
        </dl>
    </div>
    <div>
        <a href="{{ url('/product/manage/edit').'?'.http_build_query(['id' => $product->id]) }}">Edit</a> |
        <a href="{{ url('/product/manage/delete').'?'.http_build_query(['id' => $product->id]) }}">Delete</a> |
        <a href="{{ url('/product/manage') }}">Back to List</a>
    </div>
@endsection