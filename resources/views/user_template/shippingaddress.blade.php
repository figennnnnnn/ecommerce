@extends('user_template.layouts.template')
@section('main-content')
<h2>Provide Your Shipping Information</h2>

<div class="row">
    <div class="col-12">
        <div class="box_main">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('addshippingaddress') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input  style="width: 700px" type="text" class="form-control" name="phone_number" placeholder="05__ ___ __ __">
                </div>

                <div class="form-group">
                    <label for="city_name">City/Village Name</label>
                    <input style="width: 700px" type="text" class="form-control" name="city_name" placeholder="Bursa">
                </div>

                <div class="form-group">
                    <label for="postal_code">Postal Code</label>
                    <input style="width: 700px" type="text" class="form-control" name="postal_code" placeholder="16000">
                </div>
                
                <input type="submit" value="Next" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

@endsection