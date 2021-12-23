@extends('layouts.master')
@section('content')
    <h2>Order Details</h2>
    <form action="/order-store" method="POST">

        @csrf

        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter phone number"
                required>
        </div>

        <div class="form-group">
            <label for="pickup">Pick-up Address</label>
            <textarea class="form-control" id="pickup" name="pickup" placeholder="Enter pick-up address"
                required></textarea>
        </div>

        <div class="form-group">
            <label for="destination">Destination Address</label>
            <textarea class="form-control" id="destination" name="destination" placeholder="Enter destination address"
                required></textarea>
        </div>

        <div class="form-group">
            <div class="form-group">
                <label for="schedule">Scheduled for:</label>
                <input type="datetime-local" id="schedule" name="schedule" value="" min="{{ date('Y-m-d\Th:i') }}"
                    required>
            </div>
        </div>

        <div class="form-group">
            <label for="truck_id">Choose truck type</label>
            @include('layouts.truck-cards')
        </div>

        <button type="submit" class="btn btn-primary">Proceed to Checkout</button>
    </form>
@endsection
