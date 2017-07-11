<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function shipment()
    {
        return $this->hasOne('App\Models\Shipment');
    }
}
