<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "transactions";
    protected $guarded = [];
    protected $fillable = [
        'user_id',
        'promo_id',
        'truck_id',
        'payment_method_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function promo()
    {
        return $this->hasOne(Promo::class);
    }

    public function truck()
    {
        return $this->hasOne(Truck::class);
    }

    public function payment_method()
    {
        return $this->hasOne(PaymentMethod::class);
    }

    public function transaction_detail()
    {
        return $this->hasOne(TransactionDetail::class);
    }
}
