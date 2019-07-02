@extends('layouts.management')

@section('title', 'Create Order')

@section('management_content')
    <h2>Create Supplier</h2>
    <form action="{{ url('/supplier/store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">{{ 'Name' }}</label>
            <input id="name" name="name" class="form-control @error('name') is-invalid @enderror" type="text" />
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone">{{ 'Phone' }}</label>
            <input id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" type="number"/>
            @error('phone')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">{{ 'Email' }}</label>
            <input id="email" name="email" class="form-control @error('email') is-invalid @enderror" type="text" />
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="address">{{ 'Address' }}</label>
            <input id="address" name="address" class="form-control @error('address') is-invalid @enderror" type="text" />
            @error('address')
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
        <a href="{{ url('/supplier') }}">Back to List</a>
    </div>
@endsection