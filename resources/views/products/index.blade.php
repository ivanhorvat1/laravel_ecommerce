@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Products</div>
        <div class="card-body">
            <table class="table">
                <thead>
                <th>Name</th>
                <th>Price</th>
                <th>Edit</th>
                <th>Delete</th>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="{{ route('products.edit', ['id' => $product->id]) }}"
                               class="btn btn-sm btn-primary">Edit</a>
                        </td>
                        <td>
                            <a href="{{ route('products.delete', ['id' => $product->id]) }}"
                               class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection