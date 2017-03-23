<?php

namespace App\Repositories\Backend\Permission;

use App\Repositories\Repository;
use App\Models\Permission\Permission;

/**
 * Class PermissionRepository.
 */
class PermissionRepository extends Repository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Permission::class;
}
