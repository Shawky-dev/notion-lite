<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Board extends Model
{
    /** @use HasFactory<\Database\Factories\BoardFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'company',
    ];
    public static function booted()
    {
        static::created(function (Board $board) {
            $defaultSections = [
                'todo' => ['Task 1', 'Task 2', 'Task 3'],
                'pending' => ['Task 4', 'Task 5'],
                'completed' => ['Task 6', 'Task 7'],
            ];

            foreach ($defaultSections as $sectionName => $tasks) {
                $section = $board->sections()->create(['name' => $sectionName]);
                foreach ($tasks as $taskName) {
                    $section->tasks()->create(['name' => $taskName]);
                }
            }
        });
    }
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->withPivot('role', 'joined_at')
            ->withTimestamps();
    }
    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }
    public function addUser(User $user, string $role = 'member')
    {
        if (!$this->users()->where('user_id', $user->id)->exists()) {
            $this->users()->attach($user->id, [
                'role' => $role,
                'joined_at' => now(),
            ]);
        }
    }
}
