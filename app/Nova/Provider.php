<?php

namespace App\Nova;

use App\Models\PaymentConfiguration;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\KeyValue;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Provider extends Resource
{

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Provider::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        $paymentConfigurations = array();
        PaymentConfiguration::select('id')->get()->map(function ($value) use(&$paymentConfigurations) {
            $paymentConfigurations[$value->id] = $value->id;
        });

        return [
            ID::make()->sortable(),

//            Text::makcome('Code'),

            Select::make('Code')->options($paymentConfigurations),

            KeyValue::make('Title'),

            KeyValue::make('Description'),

            BelongsTo::make('Merchant'),

            BelongsTo::make('Partner'),

//            Text::make('Merchant ID', 'merchant_id'),

//            Text::make('Partner ID', 'partner_id'),

            Text::make('Key ID', 'key'),

            Text::make('Secret Key', 'secret'),

            Images::make('Logo Url', 'logo_url')
                ->rules('required')
                ->enableExistingMedia(),

//            KeyValue::make('Configuration')->rules('json'),

            Number::make('Sort Order')->sortable(),

            Boolean::make('Disabled'),

            Boolean::make('Deleted'),


        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
