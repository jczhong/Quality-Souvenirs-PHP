@extends('layouts.management')

@section('management_content')
    <h2>Order Details</h2>

    <table class="table">
        <thead>
        <tr>
            <th>
                {{ 'Product ID' }}
            </th>
            <th>
                {{ 'Name' }}
            </th>
            <th>
                {{ 'Category' }}
            </th>
            <th>
                {{ 'Quantity' }}
            </th>
            <th>
                {{ 'Unit Price' }}
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach ($order->order_details as $order_detail)
            <tr>
                <td>
                    {{ $order_detail->product_id }}
                </td>
                <td>
                    {{ $order_detail->product->name }}
                </td>
                <td>
                    {{ $order_detail->product->category->name }}
                </td>
                <td>
                    {{ $order_detail->quantity }}
                </td>
                <td>
                    {{ $order_detail->product->price }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h2>Order Summary</h2>

    <table class="table">
        <thead>
        <tr>
            <th>
                Subtotal
            </th>
            <th>
                GST(15%)
            </th>
            <th>
                Grand Total
            </th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    {{ $order->sub_total }}
                </td>
                <td>
                    {{ $order->gst }}
                </td>
                <td>
                    {{ $order->grand_total }}
                </td>
            </tr>
        </tbody>
    </table>
    <div>
        <a href="{{ url('/order') }}">Back to List</a>
    </div>
@endsection