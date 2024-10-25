@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Check Your Order Status</h1>
    <form action="{{ route('order.search') }}" method="GET">
        <div class="form-group">
            <label for="invoice_number">Invoice Number:</label>
            <input type="text" id="invoice_number" name="invoice_number" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    @if(isset($order))
        <h3>Status: {{ $order->status }}</h3>

        @if ($order->status == 'Delivered')
            <img src="{{ $order->delivery_photo }}" alt="Delivered Photo" class="img-fluid">
        @elseif ($order->status == 'In process')
            <p>Process: {{ $order->process_name }} | Date: {{ $order->process_date }}</p>
        @endif
    @endif
</div>
@endsection
