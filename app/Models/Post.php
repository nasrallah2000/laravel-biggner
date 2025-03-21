<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    function user()
    {
        return   $this->belongsTo(User::class);
    }

    function comments() {
        return $this->hasMany(Comment::class);
    }
    function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
