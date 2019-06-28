@extends('layouts.management')

@section('management_content')
    <h2>Souvenirs</h2>

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
        @foreach ($souvenirs as $souvenir)
            <tr>
                <td>
                    {{ $souvenir->Name }}
                </td>
                <td>
                    {{ $souvenir->Price }}
                </td>
                <td>
                    {{ $souvenir->Popularity }}
                </td>
                <td>
                    {{ $souvenir->category->Name }}
                </td>
                <td>
                    {{ $souvenir->supplier->Name }}
                </td>
                @if ($isAdmin == true)
                    <td>
                        <a href="{{ url('/order/edit').'?'.http_build_query(['id' => $souvenir->id]) }}">Edit</a> |
                        <a href="{{ url('/order/detail').'?'.http_build_query(['id' => $souvenir->id]) }}">Detail</a> |
                        <a href="{{ url('/order/delete').'?'.http_build_query(['id' => $souvenir->id]) }}">Delete</a>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection