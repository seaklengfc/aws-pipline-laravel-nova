<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantUser extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'nova_merchant_user';

}
