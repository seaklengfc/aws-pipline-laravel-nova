<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApimSetting extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
