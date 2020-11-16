<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Comment extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'article_id',
        'comment'
    ];

    public static function getCommentPagination($articleId)
    {
        return Comment::where('article_id', $articleId)->with('user')->orderBy('created_at', 'desc')->paginate(10);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
