@extends('user_template.layouts.template')
@section('main-content')
<h2>{{ $subcategory->subcategory_name }}</h2>
<div id="all-genre" data-tab-content class="active">
    <div class="row">
      @foreach ($products as $product)
      <div class="col-md-3">
          <figure class="product-style">
            <img src="{{ asset($product->product_img) }}" alt="Books" class="product-item">
            <form action="{{ route('addproducttocart', $product->id) }}" method="POST">
              @csrf
              <input type="hidden" value="{{ $product->id }}" name="product_id">
              <input type="hidden" value="{{ $product->price }}" name="price">
              <input type="hidden" value="1" name="quantity">
              <input type="submit"  class="add-to-cart" data-product-tile="add-to-cart" value="Add To Cart">
            </form>
            <figcaption>
                <h3>{{ $product->product_name }}</h3>
                <p>{{ $product->product_author }}</p>
                <div class="item-price">{{ $product->product_price }} TL</div>
            </figcaption>
        </figure>
      </div>
      @endforeach
        

        
  </div>
@endsection