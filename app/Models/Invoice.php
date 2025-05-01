<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'customer_id',
        'order_details',
        'total_amount',
        'discount',
        'advanced_payment', // Add this line
        'status',
    ];

    // Define the relationship to the Customer (user)
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
