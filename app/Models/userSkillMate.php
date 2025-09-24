<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserSkillMate extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user_skill_mates';

    protected $fillable = [
        'name',
        'email',
        'nickname',
        'password',
        'instagram_link',
        'tags',
        'bio',
        'profile_img',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'tags' => 'array',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class, 'user_id');
    }

    public function bookmarkedBy()
    {
        return $this->hasMany(Bookmark::class, 'bookmarked_user_id');
    }

    public function hasBookmarked($userId, $type = 'skillmate')
    {
        return $this->bookmarks()
            ->where('bookmarked_user_id', $userId)
            ->where('type', $type)
            ->exists();
    }
}