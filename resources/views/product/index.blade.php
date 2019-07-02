@extends('layouts.management')

@section('management_content')
    <h2>Products</h2>

    <p>
        <a href="{{ url('/product/manage/create') }}">Create New</a>
    </p>
    <table class="table">
        <thead>
        <tr>
            <th>
                {{ 'Name' }}
            </th>
            <th>
                {{ 'Price' }}
            </th>
            <th>
                {{ 'Popularity' }}
            </th>
            <th>
                {{ 'Category' }}
            </th>
            <th>
                {{ 'Supplier' }}
            </th>
            <th>
                {{ 'Operations' }}
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>
                    {{ $product->name }}
                </td>
                <td>
                    {{ $product->price }}
                </td>
                <td>
                    {{ $product->popularity }}
                </td>
                <td>
                    {{ $product->category->name }}
                </td>
                <td>
                    {{ $product->supplier->name }}
                </td>
                <td>
                    <a href="{{ url('/product/manage/edit').'?'.http_build_query(['id' => $product->id]) }}">Edit</a> |
                    <a href="{{ url('/product/manage/show').'?'.http_build_query(['id' => $product->id]) }}">Detail</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection