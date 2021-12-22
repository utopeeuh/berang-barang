<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;
    protected $table = "promos";
    protected $guarded = [];
    protected $fillable = [
        'name',
        'discount',
    ];

    public function transactions()
    {
        return $this->belongsTo(Transaction::class);
    }
}
