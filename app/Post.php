<?php

namespace App; 

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title','body' ,'published','user_id'//ono sto mozemo uneti u bazu, npr ima i $hidden, nekada
        //brojeve kartica ne zelimo da idu u bazu itd
        // morali smo dodati published, jer i njega sada ubacujemo u bazu
    ];

    protected function published(){
        return self::where('published',1)->get(); //self znaci na to na sebe
    }

    public function comments()
    {
        return $this->hasMany(Comment::class); //jedan post ima vise komentara
    }

    public function user()
    {
        return $this->belongsTo(User::class); 
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class); 
    }
    
    public function addComment($author,$text,$post_id)
    {
        Comment::create([
            'author' => $author,
            'text' => $text,
            'post_id' => $post_id
            
         ]);
    }
}
