<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Sensor extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name',
        'client_id',
        'status'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
