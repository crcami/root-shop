@extends('layout.base')

@section('content')
<div class="container">
    <h1>Product Details</h1>
    <div class="card">
        <div class="card-header">
            {{ $product->product_name ?? 'No name' }}
        </div>
        <div class="card-body">
            <p><strong>Barcode:</strong> {{ $product->barcode }}</p>
            <p><strong>Product Name:</strong> {{ $product->product_name ?? 'No name' }}</p>
            <p><strong>Unit Price:</strong> {{ $product->unit_price }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
