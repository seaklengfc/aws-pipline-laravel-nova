<?php

namespace Database\Seeders;

use App\Const\PermissionActionConstant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!User::where('name', 'admin')->exists()) {
            $user = User::create([
                'name'  =>  'admin',
                'email' =>  'admin@admin.com',
                'password'  =>  Hash::make('password'),
            ]);

//            $permissionNames = [
//                'merchants', 'merchant_credentials', 'partners', 'promotions', 'system_settings',
//                'providers', 'tom_meta', 'transactions', 'transaction_snapshots', 'users', 'apim_settings'
//            ];
            $permissionActions = ['view', 'create', 'update', 'delete'];

            foreach (\App\Const\PermissionConstant::getAllConsts() as $key => $value) {
                foreach (PermissionActionConstant::getAllConsts() as $actionKey => $actionValue) {
                    Permission::create(['name'  =>  "$value $actionValue"]);

                }

            }

//            Permission::create(['name'  =>  "add merchant on provider"]);
//            Permission::create(['name'  =>  "add partner on provider"]);
//            Permission::create(['name'  =>  "add merchant on apim_setting"]);
//            Permission::create(['name'  =>  "add merchant on user"]);
//            Permission::create(['name'  =>  "add user on merchant"]);
//            Permission::create(['name'  =>  "attach user to merchant"]);
//            Permission::create(['name'  =>  "detach user to merchant"]);

            $role = Role::create(['name'    =>  'admin']);

            $permissions = Permission::get();

            foreach ($permissions as $permission) {
                $role->givePermissionTo($permission);
            }



            $user->assignRole('admin');
        }

    }
}
