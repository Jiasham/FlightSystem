<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user'; // ✅ Important: Your table name is "user" (not users)
    protected $primaryKey = 'userID';
    public $incrementing = true;
    public $timestamps = false; // ✅ Since your table doesn't have updated_at or Laravel auto timestamps

    protected $fillable = [
        'username', 'email', 'phoneNumber', 'password', 'created_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
