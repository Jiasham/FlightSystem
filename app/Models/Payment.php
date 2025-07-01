<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'Payment';
    protected $primaryKey = 'paymentID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
