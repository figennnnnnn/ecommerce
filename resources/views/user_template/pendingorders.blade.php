@extends('user_template.layouts.user_profile_template')
@section('profilecontent')
@if (session()->has('message'))
      <div class="alert alert-success">
        {{ session()->get('message') }}
      </div>
@endif

<table class="table" style="width: 100%">
    <tr>
        <th></th>
        <th>Product Id</th>
        <th>Product Name</th>
        <th>Price</th>
    </tr>
    @foreach ($pending_orders as $order)
    <tr>
        @php
            $product_name = App\Models\Product::where('id', $order->product_id)->value('product_name');
        @endphp
        <td></td>
        <td>
            {{ $order->product_id }}
        </td>
        <td>{{ $product_name }}</td>
        <td>
            {{ $order->total_price }}
        </td>
    </tr>
    @endforeach
    
</table>
@endsection