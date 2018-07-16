<?php

namespace App; 

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title','body' ,'published'//ono sto mozemo uneti u bazu, npr ima i $hidden, nekada
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
}
