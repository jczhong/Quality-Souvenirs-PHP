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
                {{ 'Address' }}
            </th>
            <th>
                {{ 'Phone' }}
            </th>
            <th>
                {{ 'GST' }}
            </th>
            <th>
                {{ 'GrandTotal' }}
            </th>
            <th>
                {{ 'Order Status' }}
            </th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>
                    {{ $order->FirstName.' '.$order->LastName }}
                </td>
                <td>
                    {{ $order->Address }}
                </td>
                <td>
                    {{ $order->PhoneNumber }}
                </td>
                <td>
                    {{ $order->GST }}
                </td>
                <td>
                    {{ $order->GrandTotal }}
                </td>
                <td>
                    {{ $order->OrderStatus }}
                </td>
                @if ($isAdmin == true)
                    <td>
                        <a href="{{ url('/order/edit') }}">Edit</a>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection