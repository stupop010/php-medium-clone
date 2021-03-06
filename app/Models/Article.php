<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;


    protected $fillable = [
        'slug',
        'title',
        'subject',
        'body',
        'user_id'
    ];

    public static function getArticlesWithFollows($id)
    {
        return  Article::where('user_id', $id)->with(['user', 'tag'])->orderBy('created_at', 'DESC')->withCount('follow')->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tag()
    {
        return $this->hasMany(Tag::class);
    }

    public function follow()
    {
        return $this->hasMany(Follow::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
