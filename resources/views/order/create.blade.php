@extends('layouts.root')

@section('title', 'Create Order')

@section('content')
    <div class="row mt-2">
        <div class="col">
            <h2>Submit Order</h2>
            <form action="{{ url('/order/store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="firstName">{{ 'FirstName' }}</label>
                    <input id="firstName" name="firstName" class="form-control @error('firstName') is-invalid @enderror" type="text" required/>
                    @error('firstName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="lastName" class="control-label">{{ 'LastName' }}</label>
                    <input id="lastName" name="lastName" class="form-control @error('lastName') is-invalid @enderror" type="text" required/>
                    @error('lastName')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address" class="control-label">{{ 'Address' }}</label>
                    <input id="address" name="address" class="form-control @error('address') is-invalid @enderror" type="text" value="{{ $address }}" required/>
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phoneNumber" class="control-label">{{ 'Phone' }}</label>
                    <input id="phoneNumber" name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ $phone }}" required/>
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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