@extends('layouts.management')

@section('management_content')
    <h2>Suppliers</h2>

    <p>
        <a href="{{ url('/supplier/create') }}">Create New</a>
    </p>
    <table class="table">
        <thead>
        <tr>
            <th>
                {{ 'Name' }}
            </th>
            <th>
                {{ 'Phone' }}
            </th>
            <th>
                {{ 'Email' }}
            </th>
            <th>
                {{ 'Address' }}
            </th>
            <th>
                {{ 'Operations' }}
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach ($suppliers as $supplier)
            <tr>
                <td>
                    {{ $supplier->name }}
                </td>
                <td>
                    {{ $supplier->phone }}
                </td>
                <td>
                    {{ $supplier->email }}
                </td>
                <td>
                    {{ $supplier->address }}
                </td>
                <td>
                    <a href="{{ url('/supplier/edit').'?'.http_build_query(['id' => $supplier->id]) }}">Edit</a> |
                    <a href="{{ url('/supplier/delete').'?'.http_build_query(['id' => $supplier->id]) }}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection