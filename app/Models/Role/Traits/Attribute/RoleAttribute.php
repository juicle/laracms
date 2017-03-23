<?php

namespace App\Models\Role\Traits\Attribute;

/**
 * Class RoleAttribute.
 */
trait RoleAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return 'role.edit';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        //Can't delete master admin role
        if ($this->id != 1) {
            return 'role.destroy';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return $this->getEditButtonAttribute().
        $this->getDeleteButtonAttribute();
    }
}
