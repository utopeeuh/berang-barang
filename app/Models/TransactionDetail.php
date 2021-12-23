<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $primaryKey = 'transaction_id';
    protected $table = "transaction_details";
    protected $guarded = [];
    protected $fillable = [
        'transaction_id',
        'phone_number',
        'pickup',
        'destination',
        'schedule',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
