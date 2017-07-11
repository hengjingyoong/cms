<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function containers()
    {
        return $this->hasMany('App\Models\Container');
    }

    public function shipments()
    {
        return $this->hasMany('App\Models\Shipment');
    }
}
