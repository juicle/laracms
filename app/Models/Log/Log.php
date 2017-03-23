<?php

namespace App\Models\Log;

use Illuminate\Database\Eloquent\Model;
use App\Models\Log\Traits\Relationship\LogRelationship;

/**
 * Class History
 * package App.
 */
class Log extends Model
{
    use LogRelationship;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['type_id', 'user_id', 'entity_id', 'icon', 'class', 'text', 'assets'];
}
