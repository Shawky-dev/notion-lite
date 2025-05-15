<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name', 'board_id'];
    public function boards()
    {
        return $this->belongsTo(Board::class);
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
