@extends('layouts.management')

@section('management_content')
    <h2>Product</h2>
    <form action="{{ url('/category/update/'.$category->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">{{ 'Name' }}</label>
            <input id="name" name="name" class="form-control @error('name') is-invalid @enderror" type="text" value="{{ $category->name }}" />
            @error('name')
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
            <input type="submit" value="Submit" class="btn btn-success"/>
        </div>
    </form>
    <div>
        <a href="{{ url('/category') }}">Back to List</a>
    </div>
@endsection