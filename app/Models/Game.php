<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['title', 'developer', 'publisher', 'release_year', 'platform_id', 'photo'];

    public function getInitials()
    {
        return collect(explode(' ', $this->title))
            ->map(fn($segment) => mb_substr($segment, 0, 1))
            ->take(3)
            ->join('') ?: '??';
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }
}