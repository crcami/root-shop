@extends('layout.base')

@section('content')
    <div class="container">
        <h1>Edit Order</h1>
        <form action="{{ route('orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="client_id" class="form-label">Client</label>
                <select name="client_id" class="form-control" id="client_id" required>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}" {{ $order->client_id == $client->id ? 'selected' : '' }}>{{ $client->client_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="order_status" class="form-label">Status</label>
                <select name="order_status" class="form-control" id="order_status" required>
                    <option value="Open" {{ $order->order_status == 'Open' ? 'selected' : '' }}>Aberto</option>
                    <option value="Paid" {{ $order->order_status == 'Paid' ? 'selected' : '' }}>Pago</option>
                    <option value="Cancelled" {{ $order->order_status == 'Cancelled' ? 'selected' : '' }}>Cancelado</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="discount" class="form-label">Discount</label>
                <input type="number" step="0.01" name="discount" class="form-control" id="discount" value="{{ $order->discount }}">
            </div>
            <h3>Products</h3>
            <div id="products-container">
                @foreach ($order->orderProducts as $index => $orderProduct)
                    <div class="product-item">
                        <div class="mb-3">
                            <label for="products[{{ $index }}][product_id]" class="form-label">Product</label>
                            <select name="products[{{ $index }}][product_id]" class="form-control" required>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ $orderProduct->product_id == $product->id ? 'selected' : '' }}>{{ $product->product_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="products[{{ $index }}][quantity]" class="form-label">Quantity</label>
                            <input type="number" name="products[{{ $index }}][quantity]" class="form-control" value="{{ $orderProduct->quantity }}" required>
                        </div>
                        <button type="button" class="btn btn-danger remove-product">Remove</button>
                    </div>
                @endforeach
            </div>
            <button type="button" id="add-product" class="btn btn-secondary">Add Product</button>
            <br><br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@section('extraJs')
<script>
    let productIndex = {{ count($order->orderProducts) }};

    document.getElementById('add-product').addEventListener('click', function () {
        const container = document.getElementById('products-container');
        const productItem = document.createElement('div');
        productItem.classList.add('product-item');

        productItem.innerHTML = `
            <div class="mb-3">
                <label for="products[${productIndex}][product_id]" class="form-label">Product</label>
                <select name="products[${productIndex}][product_id]" class="form-control" required>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="products[${productIndex}][quantity]" class="form-label">Quantity</label>
                <input type="number" name="products[${productIndex}][quantity]" class="form-control" required>
            </div>
            <button type="button" class="btn btn-danger remove-product">Remove</button>
        `;

        container.appendChild(productItem);

        productIndex++;

        document.querySelectorAll('.remove-product').forEach(button => {
            button.addEventListener('click', function () {
                this.parentElement.remove();
            });
        });
    });
</script>
@endsection
