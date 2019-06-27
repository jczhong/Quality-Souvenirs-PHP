@extends('layouts.profile')

@section('profile_content')
    <h2>Orders</h2>

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
                {{ 'Enabled' }}
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
                    {{ $user->Enabled }}
                </td>
                <td>
                    <a href="{{ url('/customer/edit').'?'.http_build_query(['id' => $user->id]) }}">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection