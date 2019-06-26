@extends('layouts.app')

@section('title', 'Create Order')

@section('content')
    <div class="row mt-2">
        <div class="col">
            <h2>Submit Order</h2>
            <form action="{{ url('/order/store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="firstName">{{ 'FirstName' }}</label>
                    <input id="firstName" name="firstName" class="form-control" type="text"/>
                </div>
                <div class="form-group">
                    <label for="lastName" class="control-label">{{ 'LastName' }}</label>
                    <input id="lastName" name="lastName" class="form-control" type="text"/>
                </div>
                <div class="form-group">
                    <label for="address" class="control-label">{{ 'Address' }}</label>
                    <input id="address" name="address" class="form-control" type="text" value="{{ $address }}"/>

                </div>
                <div class="form-group">
                    <label for="phoneNumber" class="control-label">{{ 'Phone' }}</label>
                    <input id="phoneNumber" name="phone" type="text" class="form-control" value="{{ $phoneNumber }}"/>
                </div>
                <div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-success"/>
                </div>
            </form>
            <div>
                <a href="{{ url('/order') }}">Back to List</a>
            </div>
        </div>
    </div>

@endsection