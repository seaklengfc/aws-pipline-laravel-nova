<?php

namespace App\Const;

class PermissionActionConstant
{
    const VIEW_ANY = 'viewAny';
    const CREATE = 'create';

    const UPDATE = 'update';

    const DELETE = 'delete';

    public static function getAllConsts() {
        return (new \ReflectionClass(get_class()))->getConstants();
    }
}
