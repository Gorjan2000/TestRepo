<?php

namespace App\Repository;

use App\Repository\Repository;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


/**
 * Class Role Repository
 */
class RoleRepository extends \App\Repository\Repository
{
    /**
     * Retrieves the model name
     *
     * abstract method
     *
     * @return string
     */
    public function getModel(): string
    {
        return Role::class;
    }

    /**
     * Retrieves the permission
     *
     * @return \Illuminate\Database\Eloquent\Collection|Permission[]
     */
    public function getPermission()
    {
        return Permission::all();
    }
}
