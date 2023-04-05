@extends('user_template.layouts.template')
@section('main-content')
<h2>Add To Cart Page</h2>
@if (session()->has('message'))
      <div class="alert alert-success">
        {{ session()->get('message') }}
      </div>
@endif
<div class="row">
    <div class="col-12">
        <div class="box-main">
            <div class="table-responsive">
                <table class="table" style="width: 100%;">
                    <tr>
                        <th></th>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th></th>
                        <th>Action</th>
                    </tr>
                    @php
                        $total = 0;
                        $discount = 0;
                        $discount2 = 0;
                        $cost = [];
                    @endphp
                    @foreach ($cart_items as $item)
                        <tr>
                            @php
                                $product_name = App\Models\Product::where('id', $item->product_id)->value('product_name');
                                $author = App\Models\Product::where('id', $item->product_id)->value('product_author');
                                $img = App\Models\Product::where('id', $item->product_id)->value('product_img');
                                $product_quantity = App\Models\Product::where('id', $item->product_id)->value('product_quantity');
                                $price = App\Models\Product::where('id', $item->product_id)->value('product_price');
                            @endphp

                            <td></td>
                            <td><img src="{{ asset($img) }}" style="height: 100px"></td>
                            <td>{{ $product_name }} / {{ $author }}</td>
                            @if($item->quantity < $product_quantity)
                            <td>{{ $item->quantity }}
                            <td>{{ $price }} TL</td>
                            @else
                            <td>Out of Stock</td>
                            <td>0 TL</td>
                            @endif
                            
                            <td></td>
                            <td><a href="{{ route('removeitem', $item->id) }}" class="btn btn-warning">Remove</a></td>
                        </tr>
                        
                        @if($item->quantity < $product_quantity)
                        @php
                            $total = $total + $price;
                            $cell = $total;
                            $discount = $total;
                            $discount2 = $total;
                        @endphp
                        @endif
                    @endforeach
                    @php
                        array_push($cost, $total);
                    @endphp
                    @foreach ($allcampaign as $campaign)
                    @php
                        $sabahattin_ali_sayisi = 0;
                        foreach ($cart_items as $item) {
                            $product_author = App\Models\Product::where('id', $item->product_id)->value('product_author');
                            if ($product_author ==  $campaign->campaign_product_name ) {
                                $price = App\Models\Product::where('id', $item->product_id)->value('product_price');

                                $sabahattin_ali_sayisi += $item['quantity'];
                            }
                        if ($sabahattin_ali_sayisi >= $campaign->number) {
                            $discount = $total- $price;
                        }
                        }
                    @endphp
                    @if ($sabahattin_ali_sayisi >= $campaign->number)
                    <tr>
                        <td></td>
                        <td></td>
                        <td>{{ $campaign->campaign_product_name }} / {{ $campaign->product_campaign_name }}</td>
                        <td><strike>{{ $total }}</strike></td>
                        <td>{{ $discount }}</td>
                    </tr>
                    @endif
                    
                    @endforeach
                    @php
                        array_push($cost, $discount);
                    @endphp
                    @foreach ($allsecondcampaign as $secondcampaign)
                    @if ($total >= $secondcampaign->bottom_border)
                    @php
                        $discount2 = $total - ($total * 0.05);
                    @endphp
                    <tr>
                        <td></td>
                        <td></td>
                        <td>{{ $secondcampaign->price_campaign_name }}</td>
                        <td><strike>{{ $total }}</strike></td>
                        <td>{{ $discount2 }}</td>
                    </tr>
                    @endif
                    
                    @endforeach
                    @php
                        array_push($cost, $discount2);
                        $finish = min($cost);
                    @endphp
                    @if ($finish < 150)
                    @php
                        $finish = $finish + 35;
                    @endphp
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Courier Fee</td>
                        <td>35 TL</td>
                    </tr>
                    @endif
                    @if ($total > 0)
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td>{{ $finish }} TL</td>
                        <td></td>
                            <td><a href="{{ route('shippingaddress') }}" class="btn btn-primary">Checkout</a></td>
                        
                    </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>

@endsection