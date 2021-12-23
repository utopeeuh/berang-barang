<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction as TransactionModel;
use App\Models\TransactionDetail as TDModel;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function my_trans()
    {
        $transactions = Auth::user()->transactions;
        return view('my-transactions', ['transactions' => $transactions]);
    }

    public function transaction_detail($transaction_id)
    {
        $transaction = TransactionModel::find($transaction_id);

        if (Auth::user()->id != $transaction->user_id) {
            return redirect('/');
        }

        return view('transaction', ['t' => $transaction]);
    }

    public function store(Request $request)
    {
        $request->request->add(['user_id' => Auth::user()->id]);
        $transaction_data = $request->except('_token', 'phone_number', 'pickup', 'destination', 'schedule');
        TransactionModel::insert($transaction_data);
        $transaction_id = TransactionModel::latest('id')->first()->id;

        $request->request->add(['transaction_id' => $transaction_id]);
        $detail_data = $request->except('_token', 'user_id', 'truck_id');
        TDModel::insert($detail_data);

        return redirect('/checkout/' . $transaction_id);
    }

    public function checkout_view($transaction_id)
    {
        $transaction = TransactionModel::find($transaction_id);

        $constant = 0;
        $distance = rand(1, 30);

        switch ($transaction->truck_id) {
            case 1:
                $constant = 1;
                break;
            case 2:
                $constant = 1.2;
                break;
            case 3:
                $constant = 1.3;
                break;
        }

        $cost = $distance * $constant;
        $transaction->transaction_detail->cost = $cost;
        $transaction->transaction_detail->save();

        $promos = app('App\Http\Controllers\PromoController')->all();
        return view('checkout', ['detail' => $transaction->transaction_detail])->with('distance', $distance)->with('promos', $promos);
    }

    public function checkout_store(Request $request, $transaction_id)
    {
        $transaction = TransactionModel::find($transaction_id);
        $transaction->payment_method_id = $request->payment_method_id;

        if ($request->promo_id) {
            $transaction->promo_id = $request->promo_id;

            $cost = $transaction->transaction_detail->cost;
            $promo = app('App\Http\Controllers\PromoController')->getPromo($request->promo_id);
            $discount = $promo->discount;

            $newcost = $cost - ($discount / 100 * $cost);
            $detail = $transaction->transaction_detail;
            $detail->cost = $newcost;
            $detail->save();

            app('App\Http\Controllers\PromoController')->usePromo($request->promo_id);
        }

        $transaction->save();

        // return redirect('/transaction/' . $transaction_id);
        return redirect('/');
    }
}
