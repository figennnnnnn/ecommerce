@extends('admin.layouts.template')
@section('page_title')
Add Campaign - Admin Panel
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-dark">Pages/</span> Add Campaign</h4>
    
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Add New Product Campaign</h5> <small class="text-muted float-end">Input information</small>
          </div>
          <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('storecampaign') }}" method="POST">
              @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Campaign Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="product_campaign_name" name="product_campaign_name"  />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product in Cart</label>
                <div class="col-sm-10">
                    <select class="form-select" id="campaign_product_id" name="campaign_product_id" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        @foreach ($products as $product)
                          <option value="{{ $product->id }}">{{ $product->product_author }}</option>
                        @endforeach
                        
                      </select>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Number of Product in The Cart</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="number" name="number" placeholder="10" />
                </div>
              </div>
              
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Add New Price Campaign</h5> <small class="text-muted float-end">Input information</small>
          </div>
          <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('storesecondcampaign') }}" method="POST">
              @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Campaign Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="price_campaign_name" name="price_campaign_name"  />
                </div>
              </div>

              

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Discount Rate</label>
                <div class="col-sm-10">
                  <input type="float" class="form-control" id="discount_rate" name="discount_rate" placeholder="0.05" />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Bottom Border of The Cart</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="bottom_border" name="bottom_border" placeholder="100" />
                </div>
              </div>
              
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection