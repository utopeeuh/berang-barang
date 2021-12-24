@extends('layouts.master')
@section('content')
<div style="padding-left: 20%; padding-right: 20%; padding-bottom: 100px">
        <div class="card-header">
            <h2>Transaction Detail</h2>
        </div>
    <div class="card" style="padding: 50px">
        <h5><b>Transaction ID:</b> {{ $t->id }}</h5>
        <h5><b>Status:</b> {{ $t->transaction_detail->status }}</h5>
        <h5><b>Date:</b> {{ $t->transaction_detail->created_at }}</h5>
        <h5><b>Scheduled for:</b> {{ $t->transaction_detail->schedule }}</h5>
    </div>
        <div class="card-header">
            <h3>Address</h3>
        </div>
    <div class="card" style="padding: 50px">
        <h5><b>Phone Number</b></h5>
        <h6>{{ $t->transaction_detail->phone_number }}</h6>

        <h5><b>Pickup Address</b></h5>
        <h6>{{ $t->transaction_detail->pickup }}</h6>

        <h5><b>Destination Address</b></h5>
        <h6>{{ $t->transaction_detail->destination }}</h6>
    </div>
        <div class="card-header">
            <h3>Payment Information</h3>
        </div>
    <div class="card" style="padding: 50px">
        <h5><b>Payment Method</b></h5>
        <h6>{{ $t->payment_method->name }}</h6>
        <br>
        <h5><b>Promo</b></h5>
        @if ($t->promo)
            <h6>{{ $t->promo->name }}</h6>
            <h6>Discount: {{ $t->promo->discount }}%</h6>
        @else
            <h6>No promo was used.</h6>
        @endif
    </div>
        <div class="card-header">
            <h3>Truck Information</h3>
        </div>
    <div class="card" style="padding:50px">
        <h5><b>Type</b></h5>
        <h6>{{ $t->truck->type }}</h6>

        <h5><b>Dimensions</b></h5>
        <h6>{{ $t->truck->dimensions }}</h6>

        <h5><b>Supports up to</b></h5>
        <h6>{{ $t->truck->supports }}kg</h6>

    </div>
        <div class="card-header">
            <h3>Driver Information</h3>
        </div>

    <div class="card" style="padding:50px">
        <img src="{{ $t->driver->picture }}" alt="Picture of driver {{ $t->driver_id }}" style="width: 100px">
        <br>
        <h5><b>Name</b></h5>
        <h6>{{ $t->driver->name }}</h6>
        <br>
        <h5><b>Driver Phone Number</b></h5>
        <h6>{{ $t->driver->phone_number }}</h6>
    </div>
</div>


@endsection
