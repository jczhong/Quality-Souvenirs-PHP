@extends('layouts.root')

@section('title', 'Profile')

@section('content')
<div class="row mt-4">
    <div class="col-2">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('order*') ? 'active' : '' }}" href="{{ url('/order') }}">Orders</a>
            </li>
            @if (Gate::allows('management'))
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('customer*') ? 'active' : '' }}" href="{{ url('/customer') }}">Customers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('product/manage*') ? 'active' : '' }}" href="{{ url('/product/manage') }}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('supplier*') ? 'active' : '' }}" href="{{ url('/supplier') }}">Suppliers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('category*') ? 'active' : '' }}" href="{{ url('/category') }}">Categories</a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link {{ Request::is('profile*') ? 'active' : '' }}" href="{{ url('/profile') }}">Profile</a>
            </li>
        </ul>
    </div>
    <div class="col-10">
        @yield('management_content')
    </div>
</div>
@endsection