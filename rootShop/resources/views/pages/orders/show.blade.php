@extends('layout.base')

@section('content')
    <div class="container">
        <h1>Order Details</h1>
        <div class="mb-3">
            <label for="client_id" class="form-label">Client</label>
            <p>{{ $order->client->client_name }}</p>
        </div>
        <div class="mb-3">
            <label for="order_status" class="form-label">Status</label>
            <p>{{ $order->order_status }}</p>
        </div>
        <div class="mb-3">
            <label for="total_amount" class="form-label">Total Amount</label>
            <p>{{ $order->total_amount }}</p>
        </div>
        <div class="mb-3">
            <label for="discount" class="form-label">Discount</label>
            <p>{{ $order->discount }}</p>
        </div>
        <h3>Products</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Barcode</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderProducts as $orderProduct)
                    <tr>
                        <td>{{ $orderProduct->product_name }}</td>
                        <td>{{ $orderProduct->barcode }}</td>
                        <td>{{ $orderProduct->unit_price }}</td>
                        <td>{{ $orderProduct->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('orders.index') }}" class="btn btn-primary">Back to Orders</a>
    </div>
@endsection
