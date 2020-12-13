<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Developer extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'name'];

    public function todos() : BelongsToMany
    {
        return $this->belongsToMany(Todo::class);
    }
}
