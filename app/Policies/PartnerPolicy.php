<?php

namespace App\Policies;

use App\Const\PermissionConstant;

class PartnerPolicy extends BasePolicy
{
    public function __construct()
    {
        parent::__construct(PermissionConstant::PARTNER);
    }

}
