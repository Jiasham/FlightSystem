<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'Booking';
    protected $primaryKey = 'bookingID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    // ✅ Define relationship to Flight
    public function flight()
    {
        return $this->belongsTo(Flight::class, 'flightID', 'flightID');
    }
}
