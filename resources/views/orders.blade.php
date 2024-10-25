@extends('layouts.app')

@section('content')
    <h1>Orders</h1>

    <div>
        <a href="{{ route('orders.create') }}" class="btn btn-primary">Create New Order</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Invoice #</th>
                <th>Customer Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->statuses->isNotEmpty() ? $order->statuses->last()->status : 'No Status Available' }}</td>
                    <td>
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Archived Orders</h2>
    <table>
        <thead>
            <tr>
                <th>Invoice #</th>
                <th>Customer Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($archivedOrders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->statuses->isNotEmpty() ? $order->statuses->last()->status : 'No Status Available' }}</td>
                    <td>
                        <form action="{{ route('orders.restore', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to restore this order?')">Restore</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
