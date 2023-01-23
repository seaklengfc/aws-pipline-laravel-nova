<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $casts = [
        'message'   =>  'collection',
        'start_date'    =>  'datetime',
        'end_date'  =>  'datetime',
    ];
}
