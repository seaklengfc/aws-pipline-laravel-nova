<?php

namespace App\Providers;

use App\Models\Media;
use App\Models\SystemSetting;
use App\Nova\ApimSetting;
use App\Nova\Merchant;
use App\Nova\MerchantCredential;
use App\Nova\Partner;
use App\Nova\Provider;
use App\Nova\Transaction;
use App\Nova\TransactionSnapshot;
use App\Nova\User;
use App\Observers\MediaObserver;
use App\Observers\SystemSettingObserver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Itsmejoshua\Novaspatiepermissions\Novaspatiepermissions;
use Itsmejoshua\Novaspatiepermissions\Permission;
use Itsmejoshua\Novaspatiepermissions\Role;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
//        Nova::withoutThemeSwitcher();
        Nova::withoutNotificationCenter();
        Nova::withoutGlobalSearch();

        Nova::serving(function () {
            SystemSetting::observe(SystemSettingObserver::class);
            Media::observe(MediaObserver::class);

        });

        Nova::userTimezone(function (Request $request) {
            return 'Asia/Phnom_Penh';
        });

        Nova::footer(function ($request) {
            return Blade::render('');
        });

        Nova::mainMenu(function (Request $request) {
            return
                [

                    MenuSection::make('Provider', [
                        MenuItem::resource(Merchant::class),
                        MenuItem::resource(Partner::class),
                        MenuItem::resource(Provider::class),
                    ])->icon('identification')->collapsable(),

                    MenuSection::make('Credential', [
                        MenuItem::resource(MerchantCredential::class),
                    ])->icon('cog')->collapsable(),

                    MenuSection::make('Transaction', [
                        MenuItem::resource(Transaction::class),
                        MenuItem::resource(TransactionSnapshot::class),
                    ])->icon('document-text')->collapsable(),

                    MenuSection::make('User', [
                        MenuItem::resource(User::class),
                    ])->icon('user')->collapsable(),


                    MenuSection::make('Permission', [
                        MenuItem::link(__('nova-spatie-permissions::lang.sidebar_label_roles'), 'resources/roles'),
                        MenuItem::link(__('nova-spatie-permissions::lang.sidebar_label_permissions'), 'resources/permissions'),
                    ])->icon('key')->collapsable(),

                    MenuSection::make('Setting', [
                        MenuItem::resource(ApimSetting::class),
                        MenuItem::resource(\App\Nova\SystemSetting::class),
                    ])->icon('cog')->collapsable()
                ];
        });
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            Novaspatiepermissions::make()->canSee(function ($request) {
                return $request->user()->id === 1;
            }),
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
