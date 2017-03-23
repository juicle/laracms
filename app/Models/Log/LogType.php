<?php

namespace App\Models\Log;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HistoryType
 * package App.
 */
class LogType extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'log_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
