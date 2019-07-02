@extends('layouts.management')

@section('management_content')
    <h2>Customers</h2>

    <table class="table">
        <thead>
        <tr>
            <th>
                {{ 'Name' }}
            </th>
            <th>
                {{ 'Email' }}
            </th>
            <th>
                {{ 'Active' }}
            </th>
            <th>
                {{ 'Operations' }}
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>
                    {{ $user->name }}
                </td>
                <td>
                    {{ $user->email }}
                </td>
                <td>
                    {{ $user->active == 1 ? 'true' : 'false' }}
                </td>
                <td>
                    <a href="{{ url('/customer/edit').'?'.http_build_query(['id' => $user->id]) }}">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection