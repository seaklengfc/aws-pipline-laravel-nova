<?php

namespace App\Policies;

use App\Const\PermissionConstant;

class TransactionPolicy extends BasePolicy
{
    public function __construct()
    {
        parent::__construct(PermissionConstant::TRANSACTION);
    }

}
