<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $table = "transaction_details";
    protected $guarded = [];
    protected $fillable = [
        'transaction_id',
        'phone_number',
        'status',
        'pickup',
        'destination',
        'schedule',
        'cost',
        'created_at',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
