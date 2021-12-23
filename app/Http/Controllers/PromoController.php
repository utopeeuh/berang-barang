<?php

namespace App\Http\Controllers;

use App\Models\Promo as PromoModel;

use Illuminate\Http\Request;

class PromoController extends Controller
{
    //
    public function all()
    {
        return PromoModel::all();
    }

    public function usePromo($promo_id)
    {
        $promo = PromoModel::find($promo_id);
        $promo->isused = 1;
        $promo->save();
    }

    public function getPromo($promo_id)
    {
        return PromoModel::find($promo_id);
    }
}
