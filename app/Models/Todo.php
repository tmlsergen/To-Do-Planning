<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['level', 'duration', 'slug'];

    public function developers() : BelongsToMany
    {
        return $this->belongsToMany(Developer::class);
    }

    public function hourlyWork(): int {
        return $this->level * $this->duration;
    }
}
