@extends('layouts.master')
@section('content')
    <div  style="padding-left: 20%; padding-right: 20%; padding-bottom: 100px">
        <div class="card">
            <div class="card-header">
                <h2>Checkout</h2>
            </div>
            <form action="/checkout-store/{{ $detail->transaction_id }}" method="POST">

                @csrf
                <br>
                <div class="form-group" style="text-align: center">
                    <h4>Payment Method</h4>
                    <input type="radio" class="btn-check" name="payment_method_id" id="pmid1" autocomplete="off" value="1"
                        required>
                    <label class="btn btn-secondary" for="pmid1">Debit Card</label>

                    <input type="radio" class="btn-check" name="payment_method_id" id="pmid2" autocomplete="off" value="2">
                    <label class="btn btn-secondary" for="pmid2">Credit Card</label>

                    <input type="radio" class="btn-check" name="payment_method_id" id="pmid3" autocomplete="off" value="3">
                    <label class="btn btn-secondary" for="pmid3">GoPay</label>
                </div>
                <br>
                {{-- PROMO MODAL --}}
                <div style="text-align: center">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#promo-modal">
                        Choose Promo
                    </button>
                </div>
                @include('modals.promo')
                <br><br>
        </div>

            <div class="card">
                <div class="card-header">
                    <h3>Order Details</h3>
                </div>
                <div style="padding: 50px">
                    <h5>Phone Number</h5>
                    <h6>{{ $detail->phone_number }}</h6>
                    <br>
                    <h5>Pick-up Address</h5>
                    <h6>{{ $detail->pickup }}</h6>
                    <br>
                    <h5>Destination Address</h5>
                    <h6>{{ $detail->destination }}</h6>
                    <br>
                    <h5>Scheduled for</h5>
                    <h6>{{ $detail->schedule }}</h6>
                </div>

            </div>


                <div class="card-header">
                    <h3>Total</h3>
                </div>
            <div class="card" style="padding: 50px">
                <h6>Distance: {{ $distance }} km</h6>
                <h6 id="discount-text">Discount: -</h6>
                <h4 id="cost-text">Cost: {{ $detail->cost }}</h6>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Checkout</button>
        </form>
    </div>



@endsection
