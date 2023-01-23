<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Provider extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public $timestamps = false;

    protected $casts = [
        'title'     =>  'collection',
        'description'   =>  'collection',
        'configuration' =>  'collection'
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(130)
            ->height(130);
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo_url')->singleFile();
        $this->addMediaCollection('my_multi_collection');
    }

}
