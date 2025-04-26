<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waistcoat extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'length',
        'waist',
        'chest',
        'shoulder',
        'pocket_type',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}