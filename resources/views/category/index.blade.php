@extends('layouts.management')

@section('management_content')
    <h2>Categories</h2>

    <p>
        <a href="{{ url('/category/create') }}">Create New</a>
    </p>
    <table class="table">
        <thead>
        <tr>
            <th>
                {{ 'Name' }}
            </th>
            <th>
                {{ 'Path of Image' }}
            </th>
            <th>
                {{ 'Operations' }}
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>
                    {{ $category->name }}
                </td>
                <td>
                    {{ $category->path_of_image }}
                </td>
                <td>
                    <a href="{{ url('/category/edit').'?'.http_build_query(['id' => $category->id]) }}">Edit</a> |
                    <a href="{{ url('/category/delete').'?'.http_build_query(['id' => $category->id]) }}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection