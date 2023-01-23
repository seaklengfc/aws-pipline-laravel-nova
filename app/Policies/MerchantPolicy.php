<?php

namespace App\Policies;

use App\Const\PermissionConstant;

class MerchantPolicy extends BasePolicy
{
    public function __construct()
    {
        parent::__construct(PermissionConstant::MERCHANT);
    }

}
