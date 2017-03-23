<?php

namespace App\Models\User\Traits\Attribute;

/**
 * Class UserAttribute.
 */
trait UserAttribute
{
    /**
     * @return mixed
     */
    public function canChangeEmail()
    {
        return config('access.users.change_email');
    }

    /**
     * @return bool
     */
    public function canChangePassword()
    {
        return ! app('session')->has(config('access.socialite_session_name'));
    }

    /**
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        if ($this->isActive()) {
            return 'active';
        }

        return 'inactive';
    }

    /**
     * @return string
     */
    public function getConfirmedLabelAttribute()
    {
        if ($this->isConfirmed()) {
            return 'yes';
        }

        return 'no';
    }

    /**
     * @return mixed
     */
    public function getPictureAttribute()
    {
        return $this->getPicture();
    }

    /**
     * @param bool $size
     *
     * @return mixed
     */
    public function getPicture($size = false)
    {
        if (! $size) {
            $size = config('gravatar.default.size');
        }

        return gravatar()->get($this->email, ['size' => $size]);
    }

    /**
     * @param $provider
     *
     * @return bool
     */
    public function hasProvider($provider)
    {
        foreach ($this->providers as $p) {
            if ($p->provider == $provider) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->status == 1;
    }

    /**
     * @return bool
     */
    public function isConfirmed()
    {
        return $this->confirmed == 1;
    }

    /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        return 'user.show';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return 'user.edit';
    }

    /**
     * @return string
     */
    public function getChangePasswordButtonAttribute()
    {
        return 'user.change-password';
    }

    /**
     * @return string
     */
    public function getStatusButtonAttribute()
    {
        if ($this->id != access()->id()) {
            switch ($this->status) {
                case 0:
                    return 'btn-success';
                // No break

                case 1:
                    return 'btn-warning';
                // No break

                default:
                    return '';
                // No break
            }
        }

        return '';
    }

    /**
     * @return string
     */
    public function getConfirmedButtonAttribute()
    {
        if (! $this->isConfirmed()) {
            return 'confirm.resend';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if ($this->id != access()->id()) {
            return 'user.destroy';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute()
    {
        return 'user.restore ';
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
        return 'user.delete-permanently';
    }

    /**
     * @return string
     */
    public function getLoginAsButtonAttribute()
    {
        /*
         * If the admin is currently NOT spoofing a user
         */
        if (! session()->has('admin_user_id') || ! session()->has('temp_user_id')) {
            if ($this->id != access()->id()) {
                return 'user.login-as ';
            }
        }

        return '';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        if ($this->trashed()) {
            return $this->getRestoreButtonAttribute().
                $this->getDeletePermanentlyButtonAttribute();
        }

        return
            $this->getLoginAsButtonAttribute().
            $this->getShowButtonAttribute().
            $this->getEditButtonAttribute().
            $this->getChangePasswordButtonAttribute().
            $this->getStatusButtonAttribute().
            $this->getConfirmedButtonAttribute().
            $this->getDeleteButtonAttribute();
    }
}
