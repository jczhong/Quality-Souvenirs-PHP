@extends('layouts.profile')

@section('profile_content')
    <h2>Orders</h2>
    <form action="{{ url('/order/update/'.$order->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="status">{{ 'Order Status' }}</label>
            <select name="status" class="custom-select">
                <option value="waiting">{{ 'Waiting' }}</option>
                <option value="shipping">{{ 'Shipping' }}</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-success"/>
        </div>
    </form>
@endsection