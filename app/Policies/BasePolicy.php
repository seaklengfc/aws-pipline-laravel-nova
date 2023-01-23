<?php

namespace App\Policies;

use App\Const\PermissionActionConstant;
use App\Models\User;
use App\Util\PermissionHelper;
use Illuminate\Auth\Access\HandlesAuthorization;

class BasePolicy
{
    use HandlesAuthorization;


    protected $basePermissionName;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct($basePermissionName)
    {
        $this->basePermissionName = $basePermissionName;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {

        return $user->hasPermissionTo(PermissionHelper::actionName(
            $this->basePermissionName,
            PermissionActionConstant::VIEW_ANY
        ));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        return $user->hasPermissionTo(PermissionHelper::actionName(
            $this->basePermissionName,
            PermissionActionConstant::VIEW_ANY
        ));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->checkPermissionTo(PermissionHelper::actionName(
            $this->basePermissionName,
            PermissionActionConstant::CREATE
        ));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        return $user->checkPermissionTo(PermissionHelper::actionName(
            $this->basePermissionName,
            PermissionActionConstant::UPDATE
        ));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        return $user->checkPermissionTo(PermissionHelper::actionName(
            $this->basePermissionName,
            PermissionActionConstant::DELETE
        ));
    }

}
