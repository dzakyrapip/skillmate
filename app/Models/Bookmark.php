<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bookmarked_user_id',
        'type',
    ];

    public function user()
    {
        return $this->belongsTo(UserSkillMate::class, 'user_id');
    }

    public function bookmarkedUser()
    {
        return $this->belongsTo(UserSkillMate::class, 'bookmarked_user_id');
    }
}