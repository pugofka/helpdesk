<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Contract extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table='contracts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'date', 'comment', 'client_id', 'sla_id', 'active'];

    protected $hidden = ['created_at', 'deleted_at', 'updated_at'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    public function clients()
    {
        return $this->belongsTo('App\Models\Client', 'client_id');
    }

    public function sla()
    {
        return $this->hasMany('App\Models\Sla', 'sla_id');
    }

    // Accessor for format date
    public function getDateAttribute($value)
    {
        setlocale(LC_ALL, 'ru_RU.UTF-8');
        return Carbon::parse($value)->formatLocalized('%d %B %Y');
    }
}
