<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardUser extends Model
{
    protected $table = 'board_user';

    protected $fillable = [
        'user_id',
        'board_id',
        'role',
        'joined_at',
    ];
}
