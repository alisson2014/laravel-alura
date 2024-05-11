<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Series extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'cover_path'];

    public function seasons(): HasMany
    {
        return $this->hasMany(Season::class);
    }

    public function episodes()
    {
        return $this->hasManyThrough(Episode::class, Season::class);    
    }

    protected static function booted()
    {
        self::addGlobalScope('ordered', fn (Builder $query) => $query->orderBy('nome', 'desc'));
    }
}
