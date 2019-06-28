@extends('layouts.management')

@section('management_content')
    <h2>Customer</h2>
    <form action="{{ url('/customer/update/'.$user->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="status">{{ 'User Status' }}</label>
            <select name="status" class="custom-select">
                <option value="1">{{ 'Enable' }}</option>
                <option value="0">{{ 'Disable' }}</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-success"/>
        </div>
    </form>
@endsection