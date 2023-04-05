@extends('user_template.layouts.template')
@section('main-content')
<h2>Checkout Page</h2>
<div class="row">
    <div class="col-8">
        <div class="box_main" style="width: 800px; margin-left:300px">
            <h3>Product Will Send At-</h3>
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif
            <div class="table-responsive">
                <table class="table">
                        
                        <tr>
                            <th></th>
                            <th>City/Village</th>
                            <th></th>
                            <th></th>
                            <th>{{ $shipping_address->city_name }}</th>
                        </tr>
                        <tr>
                            <th></th>
                            <td>Postal Code</td>
                            <th></th>
                            <th></th>
                            <td>{{ $shipping_address->postal_code }}</td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>Phone Number</td>
                            <th></th>
                            <th></th>
                            <td>{{ $shipping_address->phone_number }}</td>
                        </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="box_main" style="width: 800px; margin-left:300px">
            <h3>Your Final Products Are-</h3>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Product Name</th>
                        <th></th>
                        <th></th>
                        <th>Quantity</th>
                        <th></th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($cart_items as $item)
                        <tr>
                            @php
                                $product_name = App\Models\Product::where('id', $item->product_id)->value('product_name');
                                $price = App\Models\Product::where('id', $item->product_id)->value('product_price');
                            @endphp

                            <td></td>
                            <td></td>
                            <td>{{ $product_name }}</td>
                            <td></td>
                            <td></td>
                            <td>{{ $item->quantity }}</td>
                            <td></td>
                            <td>{{ $price }} TL</td>
                            <td></td>
                        </tr>
                        @php
                            $total = $total + $price;
                        @endphp

                    @endforeach
                    <tr>
                        {{-- <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td></td>
                        <td>{{ $total }} TL</td>
                        <td></td> --}}
                        
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <form action="{{ route('placeorder') }}" method="POST" style="margin-left:300px; float: left">
        @csrf
        <input type="submit" value="Place Order" class="btn btn-primary">
    </form>
    <form action="" method="POST" style="margin-left:930px; float: rigth">
        @csrf
        <input type="submit" value="Cancel Order" class="btn btn-danger">
    </form>
</div>
@endsection