<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $table = 'Flight';
    protected $primaryKey = 'flightID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'flightID',
        'flightNumber',
        'departureLoc',
        'arrivalLoc',
        'departureDate',
        'departureTime',
        'arrivalDate',
        'arrivalTime',
        'price',
        'seatsAvailable',
    ];
}
