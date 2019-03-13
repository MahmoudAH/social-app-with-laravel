<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
     protected $table = 'friends_users';
     protected $fillable = [
        'user_id', 'friend_id', 'status',
    ];
}
