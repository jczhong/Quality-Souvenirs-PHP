@extends('layouts.management')

@section('management_content')
    <h2>Order</h2>
    <form action="{{ url('/order/update/'.$order->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="status">{{ 'Order Status' }}</label>
            <select name="status" class="custom-select">
                <option value="waiting" {{ ($order->status == 'waiting') ? 'selected' : '' }}>{{ 'Waiting' }}</option>
                <option value="shipping" {{ ($order->status == 'shipping') ? 'selected' : '' }}>{{ 'Shipping' }}</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-success"/>
        </div>
    </form>
@endsection