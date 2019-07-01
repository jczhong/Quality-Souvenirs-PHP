@extends('layouts.management')

@section('management_content')
    <h2>Profile</h2>

    <form action="{{ url('/profile/store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="fullName">{{ 'FullName' }}</label>
            <input id="fullName" name="fullName" class="form-control @error('fullName') is-invalid @enderror" type="text" value="{{ $fullName }}"/>
            @error('fullName')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email" class="control-label">{{ 'Email' }}</label>
            <input id="email" name="email" class="form-control " type="text" value="{{ $email }}" disabled/>
        </div>
        <div class="form-group">
            <label for="phoneNumber" class="control-label">{{ 'Phone' }}</label>
            <input id="phoneNumber" name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ $phoneNumber }}"/>
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="address" class="control-label">{{ 'Address' }}</label>
            <input id="address" name="address" class="form-control @error('address') is-invalid @enderror" type="text" value="{{ $address }}"/>
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
@endsection