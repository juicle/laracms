<?php

namespace App\Models\User\Traits\Relationship;

/**
 * Class RoleRelationship.
 */
trait UserRelationship
{
    public function roles()
    {
        return $this->belongsToMany(config('access.role'), config('access.role_user_table'), 'user_id', 'role_id');
    }

    /**
     * @return mixed
     */
    public function providers()
    {
        return $this->hasMany(SocialLogin::class);
    }
}
