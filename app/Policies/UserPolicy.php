<?php

namespace App\Policies;

use App\Const\PermissionConstant;

class UserPolicy extends BasePolicy
{
    public function __construct()
    {
        parent::__construct(PermissionConstant::USER);
    }

}
