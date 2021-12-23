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
        'truck_id',
        'driver_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function promo()
    {
        return $this->belongsTo(Promo::class);
    }

    public function truck()
    {
        return $this->belongsTo(Truck::class);
    }

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function transaction_detail()
    {
        return $this->hasOne(TransactionDetail::class);
    }
}
