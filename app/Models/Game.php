<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    Use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'release_year',
        'developer',
        'publisher',
        'platform_id',
        'photo'
    ];

    protected $dates = ['deleted_at'];

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }

    public function getInitials()
    {
        $words = explode(' ', $this->title);
        $initials = '';
        foreach ($words as $word) {
            $initials .= strtoupper($word[0]);
        }
        return substr($initials, 0, 2);
    }
}
