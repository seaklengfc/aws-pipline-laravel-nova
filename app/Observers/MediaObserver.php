<?php

namespace App\Observers;

use App\Models\Media;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Nova;

class MediaObserver
{
    /**
     * Handle the Media "created" event.
     *
     * @param  \App\Models\Media  $media
     * @return void
     */
    public function created(Media $media)
    {
        Nova::whenServing(function (NovaRequest $request) use ($media) {
            // Only invoked during Nova requests...
            $m = Media::find($media->id);
            if($m->model_type == "App\Models\Provider") {
                Log::info($m->getFullUrl());
                $provider = Provider::find($m->model_id);
                $provider->logo_url = $m->getFullUrl();
                $provider->save();
            }
        }, function (Request $request) use ($media) {
            // Invoked for non-Nova requests...
        });
    }

    /**
     * Handle the Media "updated" event.
     *
     * @param  \App\Models\Media  $media
     * @return void
     */
    public function updated(Media $media)
    {
        Nova::whenServing(function (NovaRequest $request) use ($media) {
            // Only invoked during Nova requests...
            $m = Media::find($media->id);
            if($m->model_type == "App\Models\Provider") {
                Log::info($m->getFullUrl());
                $provider = Provider::find($m->model_id);
                $provider->logo_url = $m->getFullUrl();
                $provider->save();
            }
        }, function (Request $request) use ($media) {
            // Invoked for non-Nova requests...
        });

    }

    /**
     * Handle the Media "deleted" event.
     *
     * @param  \App\Models\Media  $media
     * @return void
     */
    public function deleted(Media $media)
    {
        //
    }

    /**
     * Handle the Media "restored" event.
     *
     * @param  \App\Models\Media  $media
     * @return void
     */
    public function restored(Media $media)
    {
        //
    }

    /**
     * Handle the Media "force deleted" event.
     *
     * @param  \App\Models\Media  $media
     * @return void
     */
    public function forceDeleted(Media $media)
    {
        //
    }
}
