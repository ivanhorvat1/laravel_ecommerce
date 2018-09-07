@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Create a new product</div>

        <div class="card-body">
            <form action="{{ route('products.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                </div>
                <div class="form-group">
                    <label for="name">Price</label>
                    <input type="number" name="price" class="form-control" value="{{ $product->price }}">
                </div>
                <div class="form-group">
                    <label for="name">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Update Product
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
