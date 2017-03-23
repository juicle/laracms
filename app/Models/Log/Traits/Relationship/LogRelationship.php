<?php

namespace App\Models\Log\Traits\Relationship;

use App\Models\User\User;
use App\Models\Log\LogType;

/**
 * Class HistoryRelationship.
 */
trait LogRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        return $this->hasOne(LogType::class, 'id', 'type_id');
    }
}
