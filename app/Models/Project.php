<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table='projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['contract_id', 'name', 'url_production', 'url_dev', 'description', 'payed_hours', 'cost', 'show', 'active'];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function credentional()
    {
        return $this->hasOne('App\Models\Credentional', 'project_id');
    }

    public function tasks()
    {
        return $this->hasMany('App\Models\Task', 'project_id');
    }
}
