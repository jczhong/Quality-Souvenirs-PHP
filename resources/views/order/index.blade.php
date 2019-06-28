@extends('layouts.management')

@section('management_content')
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
                    {{ $order->first_name.' '.$order->last_name }}
                </td>
                <td>
                    {{ $order->address }}
                </td>
                <td>
                    {{ $order->phone }}
                </td>
                <td>
                    {{ $order->gst }}
                </td>
                <td>
                    {{ $order->grand_total }}
                </td>
                <td>
                    {{ $order->status }}
                </td>
                @if ($isAdmin == true)
                    <td>
                        <a href="{{ url('/order/edit').'?'.http_build_query(['id' => $order->id]) }}">Edit</a>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection