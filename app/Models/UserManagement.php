<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserManagement extends Model
{
    protected $table = 'UserManagement';
    protected $primaryKey = 'manageUserID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
