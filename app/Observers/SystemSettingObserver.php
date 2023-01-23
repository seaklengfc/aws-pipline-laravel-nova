<?php

namespace App\Observers;

use App\Models\SystemSetting;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Nova;

class SystemSettingObserver
{

    /**
     * Handle the User "creating" event.
     *
     * @param  \App\Models\SystemSetting  $systemSetting
     * @return void
     */
    public function creating(SystemSetting $systemSetting)
    {
        Nova::whenServing(function (NovaRequest $request) use ($systemSetting) {
            // Only invoked during Nova requests...
            $systemSetting->created_by = $request->user()->id;
            $systemSetting->updated_by = $request->user()->id;
        }, function (Request $request) use ($systemSetting) {
            // Invoked for non-Nova requests...
        });
    }

    /**
     * Handle the SystemSetting "created" event.
     *
     * @param  \App\Models\SystemSetting  $systemSetting
     * @return void
     */
    public function created(SystemSetting $systemSetting)
    {
        //
    }

    /**
     * Handle the SystemSetting "updated" event.
     *
     * @param  \App\Models\SystemSetting  $systemSetting
     * @return void
     */
    public function updated(SystemSetting $systemSetting)
    {
        //
    }

    /**
     * Handle the SystemSetting "deleted" event.
     *
     * @param  \App\Models\SystemSetting  $systemSetting
     * @return void
     */
    public function deleted(SystemSetting $systemSetting)
    {
        //
    }

    /**
     * Handle the SystemSetting "restored" event.
     *
     * @param  \App\Models\SystemSetting  $systemSetting
     * @return void
     */
    public function restored(SystemSetting $systemSetting)
    {
        //
    }

    /**
     * Handle the SystemSetting "force deleted" event.
     *
     * @param  \App\Models\SystemSetting  $systemSetting
     * @return void
     */
    public function forceDeleted(SystemSetting $systemSetting)
    {
        //
    }
}
