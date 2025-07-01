<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlightManagement extends Model
{
    protected $table = 'FlightManagement';
    protected $primaryKey = 'manageFlightID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
