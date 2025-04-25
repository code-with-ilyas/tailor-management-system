<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pent extends Model
{
    use HasFactory;

    protected $fillable = [
        'pent_length',
        'waist',
        'hips',
        'inseam',
        'pensa',
        'pocket_type',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
