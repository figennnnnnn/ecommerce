@extends('admin.layouts.template')
@section('page_title')
Pending Orders - Admin Panel
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-dark"></span> Pending Orders</h4>

    <div class="card p-4">
        <div class="card-body">
                <table class="table">
                    <tr>
                        <th>User Id</th>
                        <th>Shipping Information</th>
                        <th>Product Id</th>
                        <th>Quantity</th>
                        <th>Total Will Pay</th>
                        <th>Action</th>
                    </tr>
                @foreach ($pending_orders as $order)
                    <tr>
                        <td>{{ $order->userid }}</td>
                        <td>
                            <ul>
                                <li>Phone Number - {{ $order->shipping_phoneNumber }}</li>
                                <li>City - {{ $order->shipping_city }}</li>
                                <li>Postal Code - {{ $order->shipping_postalcode }}</li>
                            </ul>
                        </td>
                        <td>{{ $order->product_id }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->total_price }}</td>
                        <td><a href="" class="btn btn-success">Approve Now</a></td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
</div>
@endsection