@extends('layouts.management')

@section('management_content')
    <h2>Products</h2>

    <p>
        <a href="{{ url('/order/create') }}">Create New</a>
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
                @if (\Illuminate\Support\Facades\Gate::allows('management'))
                    <td>
                        <a href="{{ url('/product/edit').'?'.http_build_query(['id' => $product->id]) }}">Edit</a> |
                        <a href="{{ url('/product/detail').'?'.http_build_query(['id' => $product->id]) }}">Detail</a> |
                        <a href="{{ url('/product/delete').'?'.http_build_query(['id' => $product->id]) }}">Delete</a>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection