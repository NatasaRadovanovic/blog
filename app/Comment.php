<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'author','text','post_id'
    ];
    public function post()
    {
        return $this->belongsTo(Post::class); // komentar pripada jednom postu
    }

    
}
