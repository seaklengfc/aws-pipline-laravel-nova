<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\ApimSetting;
use App\Models\Merchant;
use App\Models\MerchantCredential;
use App\Models\Partner;
use App\Models\Provider;
use App\Models\SystemSetting;
use App\Models\TransactionSnapshot;
use App\Models\User;
use App\Nova\Transaction;
use App\Policies\ApimSettingPolicy;
use App\Policies\BasePolicy;
use App\Policies\MerchantCredentialPolicy;
use App\Policies\MerchantPolicy;
use App\Policies\PartnerPolicy;
use App\Policies\ProviderPolicy;
use App\Policies\SystemSettingPolicy;
use App\Policies\TransactionPolicy;
use App\Policies\TransactionSnapshotPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Merchant::class => MerchantPolicy::class,
        Partner::class => PartnerPolicy::class,
        Provider::class => ProviderPolicy::class,

        MerchantCredential::class => MerchantCredentialPolicy::class,

        Transaction::class => TransactionPolicy::class,
        TransactionSnapshot::class => TransactionSnapshotPolicy::class,

        User::class => UserPolicy::class,

        ApimSetting::class => ApimSettingPolicy::class,
        SystemSetting::class => SystemSettingPolicy::class

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
