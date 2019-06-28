@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="row mt-4">
    <div class="col-2">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/order') }}">Orders</a>
            </li>
            @if ($isAdmin == true)
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/customer') }}">Customers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/souvenir') }}">Souvenirs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Suppliers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Categories</a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile') }}">Profile</a>
            </li>
        </ul>
    </div>
    <div class="col-10">
        @yield('profile_content')
    </div>
</div>
@endsection