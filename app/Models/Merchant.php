<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $casts = [
        'id'    =>  'string'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'merchant_user', 'merchant_id', 'user_id');
    }
}
