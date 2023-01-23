<?php

namespace App\Policies;

use App\Const\PermissionConstant;

class ApimSettingPolicy extends BasePolicy
{
    public function __construct()
    {
        parent::__construct(PermissionConstant::APIM_SETTING);
    }

}
