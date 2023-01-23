<?php

namespace App\Policies;

use App\Const\PermissionConstant;

class SystemSettingPolicy extends BasePolicy
{
    public function __construct()
    {
        parent::__construct(PermissionConstant::SYSTEM_SETTING);
    }

}
