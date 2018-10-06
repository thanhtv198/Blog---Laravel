<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'commentable_id',
        'commentable_type',
        'user_id',
        'content',
        'parent_id',
        'created_at',
        'updated_at',
    ];


    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function scopeGetById($query, $id)
    {
        return $query->where('commentable_id', $id)->get();
    }
}
