@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="row">
        <div class="col mt-2">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('storage/images/banner1.jpg') }}" class="d-block w-100 h-50" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('storage/images/banner2.jpg') }}" class="d-block w-100 h-50" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('storage/images/banner3.jpg') }}" class="d-block w-100 h-50" alt="">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($categories as $category)
            <div class="col-2 mt-4">
                <div class="card text-center p-2">
                    <a href="{{ url('/product/?id='.$category->id) }}">
                        <img class="card-img-top img-responsive" src="{{ asset($category->PathOfImage) }}" alt=""/>
                    </a>
                    <div class="card-body">
                        <h5 class="card-text">{{ $category->Name }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection