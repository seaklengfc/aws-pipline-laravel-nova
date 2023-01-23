<?php

namespace App\Util;

class PermissionHelper
{

    static public function actionName($baseName, $actionName) : string
    {
        return $baseName . ' ' . $actionName;
    }

}
