<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    protected $table = 'Passenger';
    protected $primaryKey = 'passengerID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
