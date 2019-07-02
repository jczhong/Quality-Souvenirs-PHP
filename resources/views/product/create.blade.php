@extends('layouts.management')

@section('title', 'Create Order')

@section('management_content')
    <h2>Create Product</h2>
    <form action="{{ url('/product/manage/store') }}" method="post" enctype="multipart/form-data">
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
            <label for="description">{{ 'Description' }}</label>
            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"></textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">{{ 'Price' }}</label>
            <input id="price" name="price" class="form-control @error('price') is-invalid @enderror" type="number" step="0.01"/>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="popularity">{{ 'Popularity' }}</label>
            <input id="popularity" name="popularity" class="form-control @error('popularity') is-invalid @enderror" type="number" />
            @error('popularity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">{{ 'Image File' }}</label>
            <input id="image" name="image" class="form-control @error('image') is-invalid @enderror" type="file" />
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="category">{{ 'Category' }}</label>
            <select name="category" class="custom-select @error('category') is-invalid @enderror">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="supplier">{{ 'Supplier' }}</label>
            <select name="supplier" class="custom-select @error('supplier') is-invalid @enderror">
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
            @error('supplier')
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
        <a href="{{ url('/product/manage') }}">Back to List</a>
    </div>
@endsection