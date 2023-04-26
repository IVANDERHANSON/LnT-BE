<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'item',
        'item_id',
        'quantity',
        'address',
        'postalCode',
        'price',
        'totalPrice',
    ];

    public function user() {
        return $this->belongsTo(Users::class);
    }
}
