@extends('layouts.root')

@section('title', 'ShoppingCart')

@section('content')
    <div class="row mt-2">
        <div class="col">
            <h2>Shopping Cart</h2>

            <table class="table">
                <thead>
                <tr>
                    <th>
                        Souvenir ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Category
                    </th>
                    <th>
                        Quantity
                    </th>
                    <th>
                        Unit Price
                    </th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($cartItems as $cartItem)
                    <tr>
                        <td>
                            {{ $cartItem->souvenir->id }}
                        </td>
                        <td>
                            {{ $cartItem->souvenir->Name }}
                        </td>
                        <td>
                            {{ $cartItem->souvenir->category->Name }}
                        </td>
                        <td>
                            {{ $cartItem->Count }}
                        </td>
                        <td>
                            {{ $cartItem->souvenir->Price }}
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ url('/cart/add'.'?'.http_build_query(['id' => $cartItem->souvenir->id, 'count' => 1])) }}">+</a>
                            <a class="btn btn-success" href="{{ url('/cart/remove'.'?'.http_build_query(['id' => $cartItem->souvenir->id, 'count' => 1])) }}">-</a>
                            <a class="btn btn-danger" href="{{ url('/cart/remove'.'?'.http_build_query(['id' => $cartItem->souvenir->id, 'count' => $cartItem->Count])) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col">
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
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if ($subTotal != 0.0)
                    <tr>
                        <td>
                            {{ $subTotal }}
                        </td>
                        <td>
                            {{ $gst }}
                        </td>
                        <td>
                            {{ $grandTotal }}
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ url('/cart/clean') }}">Clear Cart</a>
                            <a class="btn btn-success" href="{{ url('/order/create') }}">Checkout</a>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection