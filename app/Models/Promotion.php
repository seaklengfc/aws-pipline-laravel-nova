<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $casts = [
        'title' =>  'collection',
        'description' =>  'collection'
    ];
}
