@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Create a new product</div>

        <div class="card-body">
            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="name">Price</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                </div>
                <div class="form-group">
                    <label for="name">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Save Product
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
