@extends('admin.layouts.template')
@section('page_title')
All Campaign - Admin Panel
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-dark">Pages/</span> All Campaign</h4>
    
<!-- Bootstrap Table with Header - Light -->
    <div class="card">
    <h5 class="card-header">Available Product Campaign Information</h5>
    @if (session()->has('message'))
      <div class="alert alert-success">
        {{ session()->get('message') }}
      </div>
    @endif
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead class="table-light">
          <tr>
            <th>Id</th>
            <th>Campaign Name</th>
            <th>Product in Cart</th>
            <th>Number of Product in The Cart</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($allcampaigns as $campaign)
          <tr>
            <td>{{ $campaign->id }}</td>
            <td>{{ $campaign->product_campaign_name }}</td>
            <td>{{ $campaign->campaign_product_name }}</td>
            <td>{{ $campaign->number }}</td>
            <td>
                <a href="{{ route('deletecampaign', $campaign->id) }}" class="btn btn-warning">Delete</a>
            </td>
          </tr>
          @endforeach
          
          
        </tbody>
      </table>
    </div>
    </div>


    <div class="card">
        <h5 class="card-header">Available Price Campaign Information</h5>
        @if (session()->has('message'))
          <div class="alert alert-success">
            {{ session()->get('message') }}
          </div>
        @endif
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead class="table-light">
              <tr>
                <th>Id</th>
                <th>Campaign Name</th>
                <th>Discount Rate</th>
                <th>Bottom Border of The Cart</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <?php  ?>
              @foreach ($allsecondcampaigns as $secondcampaign)
              <tr>
                <td>{{ $secondcampaign->id }}</td>
                <td>{{ $secondcampaign->price_campaign_name }}</td>
                <td>{{ $secondcampaign->discount_rate }}</td>
                <td>{{ $secondcampaign->bottom_border }}</td>
                <td>
                    <a href="{{ route('deletesecondcampaign', $secondcampaign->id) }}" class="btn btn-warning">Delete</a>
                </td>
              </tr>
              @endforeach
              
              
            </tbody>
          </table>
        </div>
    </div>
</div>
@endsection