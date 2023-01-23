<?php

namespace App\Const;

class PermissionConstant
{
    const MERCHANT = 'merchants';

    const PARTNER = 'partners';

    const MERCHANT_CREDENTIAL = 'merchant_credentials';

    const PROMOTION = 'promotions';

    const PROVIDER = 'providers';

    const PAYMENT_CONFIGURATION = 'payment_configurations';

    const TRANSACTION = 'transaction';

    const TRANSACTION_SNAPSHOT = 'transaction_snapshot';

    const USER = 'user';

    const APIM_SETTING = 'apim_settings';

    const SYSTEM_SETTING = 'system_settings';


    public static function getAllConsts() {
        return (new \ReflectionClass(get_class()))->getConstants();
    }
}
