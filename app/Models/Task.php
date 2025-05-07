<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'section_id', 'user_id', 'status'];

    public function sections()
    {
        return $this->belongsTo(Section::class);
    }
}
