@extends('layout.base')

@section('content')
    @include('components.alerts')

    <h1>Orders</h1>

    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Add Order</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Order Number</th>
                <th>Client</th>
                <th>Status</th>
                <th>Total Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->client->client_name }}</td>
                    <td>{{ $order->order_status }}</td>
                    <td>{{ $order->total_amount }}</td>
                    <td>
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
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
