@extends('layouts.root')

@section('title', 'Profile')

@section('content')
<div class="row mt-4">
    <div class="col-2">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/order') }}">Orders</a>
            </li>
            @if (\Illuminate\Support\Facades\Gate::allows('management'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/customer') }}">Customers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/product/manage') }}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/supplier') }}">Suppliers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/category') }}">Categories</a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/profile') }}">Profile</a>
            </li>
        </ul>
    </div>
    <div class="col-10">
        @yield('management_content')
    </div>
</div>
@endsection