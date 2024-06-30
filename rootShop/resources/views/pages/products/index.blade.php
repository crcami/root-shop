@extends('layout.base')

@section('content')
    @include('components.alerts')

    <h1>Products</h1>

    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Barcode</th>
                <th>Product Name</th>
                <th>Unit Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->barcode }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->unit_price }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
