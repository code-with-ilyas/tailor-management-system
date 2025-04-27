<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShalwarKameez extends Model
{
    use HasFactory;

    protected $table = 'shalwar_kameez';

    protected $fillable = [
        'user_id',
        'length',
        'collar',
        'shoulder',
        'back_type',
        'back',
        'cuff_type',
        'sleeves',
        'chest',
        'bottom_collar_type',
        'shalwar_type',
        'pensa',
        'pocket_type',
        'bottom_type',
        'bottom'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}