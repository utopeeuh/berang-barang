@extends('layouts.master')
@section('content')
    <div>
        <h2>Transaction Detail</h2>
        <h5>Transaction ID: {{ $t->id }}</h5>
        <h5>Status: {{ $t->transaction_detail->status }}</h5>

        <h5>Date: {{ $t->transaction_detail->created_at }}</h5>
        <h5>Scheduled for: {{ $t->transaction_detail->schedule }}</h5>
    </div>

    <div>
        <h3>Address</h3>

        <h5>Phone Number</h5>
        <h6>{{ $t->transaction_detail->phone_number }}</h6>

        <h5>Pickup Address</h5>
        <h6>{{ $t->transaction_detail->pickup }}</h6>

        <h5>Destination Address</h5>
        <h6>{{ $t->transaction_detail->destination }}</h6>
    </div>

    <div>
        <h3>Payment Information</h3>

        <h5>Payment Method</h5>
        <h6>{{ $t->payment_method->name }}</h6>

        <h5>Promo</h5>
        @if ($t->promo)
            <h6>{{ $t->promo->name }}</h6>
            <h6>Discount: {{ $t->promo->discount }}%</h6>
        @else
            <h6>No promo was used.</h6>
        @endif
    </div>

    <div>
        <h3>Truck Information</h3>

        <h5>Type</h5>
        <h6>{{ $t->truck->type }}</h6>

        <h5>Dimensions</h5>
        <h6>{{ $t->truck->dimensions }}</h6>

        <h5>Supports up to</h5>
        <h6>{{ $t->truck->supports }}kg</h6>

    </div>

@endsection
