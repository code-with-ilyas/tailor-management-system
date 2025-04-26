<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shirt extends Model
{
    use HasFactory;

    protected $fillable = [
        'length', 
        'shoulder', 
        'sleeve', 
        'chest', 
        'collar', 
        'collar_type', 
        'waist', 
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}