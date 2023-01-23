<?php

namespace App\Policies;

use App\Const\PermissionConstant;

class MerchantCredentialPolicy extends BasePolicy
{
    public function __construct()
    {
        parent::__construct(PermissionConstant::MERCHANT_CREDENTIAL);
    }

}
