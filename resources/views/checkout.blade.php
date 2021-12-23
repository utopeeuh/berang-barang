@extends('layouts.master')
@section('content')
    <h2>Checkout</h2>
    <form action="/checkout-store/{{ $detail->transaction_id }}" method="POST">

        @csrf
        <div class="form-group">
            <h4>Payment Method</h4>
            <input type="radio" class="btn-check" name="payment_method_id" id="pmid1" autocomplete="off" value="1">
            <label class="btn btn-secondary" for="pmid1">Debit Card</label>

            <input type="radio" class="btn-check" name="payment_method_id" id="pmid2" autocomplete="off" value="2">
            <label class="btn btn-secondary" for="pmid2">Credit Card</label>

            <input type="radio" class="btn-check" name="payment_method_id" id="pmid3" autocomplete="off" value="3">
            <label class="btn btn-secondary" for="pmid3">GoPay</label>
        </div>

        {{-- PROMO MODAL --}}
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#promo-modal">
            Choose Promo
        </button>
        @include('modals.promo')

        <div>
            <h3>Order Details</h3>
            <h6>{{ $detail->phone_number }}</h6>
            <h5>Pick-up Address</h5>
            <h6>{{ $detail->pickup }}</h6>
            <h5>Destination Address</h5>
            <h6>{{ $detail->destination }}</h6>
            <h5>Scheduled for</h5>
            <h6>{{ $detail->schedule }}</h6>
        </div>

        <div>
            <h3>Total</h3>
            <h6>Distance: {{ $distance }} km</h6>
            <h6 id="discount-text">Discount: -</h6>
            <h4 id="cost-text">Cost: {{ $detail->cost }}</h6>
        </div>

        <button type="submit" class="btn btn-primary">Checkout</button>
    </form>


@endsection
