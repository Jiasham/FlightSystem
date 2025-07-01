<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingManagement extends Model
{
    protected $table = 'BookingManagement';
    protected $primaryKey = 'manageBookingID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
