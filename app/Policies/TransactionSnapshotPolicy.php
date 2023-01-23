<?php

namespace App\Policies;

use App\Const\PermissionConstant;

class TransactionSnapshotPolicy extends BasePolicy
{
    public function __construct()
    {
        parent::__construct(PermissionConstant::TRANSACTION_SNAPSHOT);
    }

}
