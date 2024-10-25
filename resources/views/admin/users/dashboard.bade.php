@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <ul class="list-group">
        <li class="list-group-item"><a href="{{ route('users.index') }}">Manage Users</a></li>
        <li class="list-group-item"><a href="{{ route('orders.index') }}">Manage Orders</a></li>
        <li class="list-group-item"><a href="{{ route('orders.archived') }}">View Archived Orders</a></li>
    </ul>
</div>
@endsection
