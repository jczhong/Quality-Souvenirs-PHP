@extends('layouts.root')

@section('title', 'About')

@section('content')
    <div class="row mt-4">
        <div class="col-6">
            <h1><strong>Who we are</strong></h1>
            <div>
                We are the best in this field. We have distinctive products and enthusiastic service.As always to provide you with high-grade, luxury services,
                <strong>the more we do, the more happy you will obtain</strong>
                The website likes our motivation, and why we do what we do.
            </div>
        </div>
        <div class="col-6">
            <img class="w-100" src="{{ asset('storage/images/about.jpg') }}">
        </div>
    </div>
@endsection