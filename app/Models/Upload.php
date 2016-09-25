<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table='uploads';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'task_id', 'path'];

    public function task()
    {
        return $this->belongsTo('App\Models\Task');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
