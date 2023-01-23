<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $casts = [
        'insert_date'   =>  'datetime'
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
}
