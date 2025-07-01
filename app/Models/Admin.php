<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'Admin'; // Case-sensitive for SQLite
    protected $primaryKey = 'adminID';
    public $incrementing = false; // Since your primary keys are TEXT
    protected $keyType = 'string';
    public $timestamps = false;   // Since your tables mostly don't have timestamps
}
