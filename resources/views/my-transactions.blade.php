@extends('layouts.master')
@section('content')
    {{-- //TABLE OF USERS TRANSACTION --}}

    <div style="padding-left: 20%; padding-right: 20%; padding-bottom: 100px">
        <div class="card-header" style="text-align: center">
            <h2>My Transactions</h2>
        </div>

        <div style="text-align: center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date</th>
                        <th scope="col">Total Payment</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transactions as $t)
                        <tr>
                            <th scope="row"><a href="/transaction/{{ $t->id }}">{{ $t->id }}</a></th>
                            <td>{{ $t->transaction_detail->status }}</td>
                            <td>{{ $t->transaction_detail->created_at }}</td>
                            <td>{{ $t->transaction_detail->cost }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td>No transactions have been made... Start ordering <a href='/order'>here!</a></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


    </div>


@endsection
