@extends('layouts.root')

@section('title', 'Product')

@section('content')
    <div class="row mt-2">
        <div class="col">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item mr-sm-2 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categories
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($categories as $category)
                                    <a class="dropdown-item"
                                       href="{{ url('/product').'?'.http_build_query(['id' => $category->id, 'byId' => 'true', 'sort' => $sort, 'search' => $search, 'minprice' => $minprice, 'maxprice' => $maxprice]) }}">{{ $category->name }}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0" method="get" action="{{ url('/product') }}">
                                <input type="hidden" name="id" value="{{ $id }}" />
                                <input type="hidden" name="byId" value="{{ $byId }}" />
                                <input type="hidden" name="sort" value="{{ $sort }}" />
                                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search"
                                       aria-label="Search">
                                <input class="form-control mr-sm-2" style="width:100px" type="number" name="minprice"
                                       placeholder="MinPrice" aria-label="MinPrice"  id="MinPrice" min="0" value="{{ $minprice }}">
                                <span>-</span>
                                <input class="form-control ml-sm-2 mr-sm-2" style="width:100px" type="number"
                                       name="maxprice" placeholder="MaxPrice" aria-label="MaxPrice" id="MaxPrice" min="0"
                                       value="{{ $maxprice }}">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Go</button>
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item mr-sm-2">
                            <div class="nav-link">
                                {{ 'Showing '.(($products->currentPage() - 1) * $products->perPage() + 1).' - '.($products->currentPage() * $products->perPage()).' of '.$products->total().' products' }}
                            </div>
                        </li>
                        <li class="nav-item sort-selector" value="{{ $sort }}">
                            <select id="SortSelector" class="custom-select">
                                <option selected value="popularity">Popularity High to Low</option>
                                <option value="popularity_desc">Popularity Low to High</option>
                                <option value="price_desc">Price Low to High</option>
                                <option value="price">Price High to Low</option>
                            </select>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <div class="row mt-2 ml-2">
        <div class="col">
            @if ($byId == 'true')
                <div>
                    <span>{{ $categories->where('id', $id)->first()->name }}</span>
                    <a href="{{ url('/product').'?'.http_build_query(['id' => null, 'byId' => 'false', 'sort' => $sort, 'search' => $search, 'minprice' => $minprice, 'maxprice' => $maxprice]) }}">X</a>
                </div>
            @endif
            @if ($search != null)
                <div>
                    <span>{{ 'Search: '.$search }}</span>
                    <a href="{{ url('/product').'?'.http_build_query(['id' => $id, 'byId' => $byId, 'sort' => $sort, 'minprice' => $minprice, 'maxprice' => $maxprice]) }}">X</a>
                </div>
            @endif
        </div>
    </div>

    <div class="row mt-2">
        @foreach ($products as $product)
            <div class="col-2 mb-4">
                <div>
                    <a href="{{ url('/product/detail').'/'.$product->id }}">
                        <img width="150" height="200" src="{{ empty($product->path_of_image) ? '' : asset('storage/'.$product->path_of_image) }}">
                    </a>
                </div>
                <div class="text-center mt-1">
                    <h5>{{ $product->name }}</h5>
                    <div>{{ '$'.$product->price }}</div>
                    <div class="text-center mt-1">
                        <button class="btn btn-success" id="{{ 'AddToCart-'.$product->id }}" value="1">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row mt-2 justify-content-center">
        {{ $products->appends(['id' => $id, 'byId' => $byId, 'sort' => $sort, 'search' => $search,
            'minprice' => $minprice, 'maxprice' => $maxprice])->links() }}
    </div>
@endsection