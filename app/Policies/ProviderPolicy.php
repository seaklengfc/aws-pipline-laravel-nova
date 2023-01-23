<?php

namespace App\Policies;

use App\Const\PermissionConstant;

class ProviderPolicy extends BasePolicy
{
    public function __construct()
    {
        parent::__construct(PermissionConstant::PROVIDER);
    }

}
