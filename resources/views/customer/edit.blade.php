@extends('layouts.management')

@section('management_content')
    <h2>Customer</h2>
    <form action="{{ url('/customer/update/'.$user->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="status">{{ 'User Status' }}</label>
            <select name="status" class="custom-select">
                <option value="1" {{ ($user->active == 1) ? 'selected' : '' }}>{{ 'Active' }}</option>
                <option value="0" {{ ($user->active == 0) ? 'selected' : '' }}>{{ 'Inactive' }}</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-success"/>
        </div>
    </form>
@endsection