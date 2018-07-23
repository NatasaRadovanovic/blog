<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::all()->each(function (App\User $u){ //cupamo sve usere, u each je jedan user
            //to je zapravo $u
            $u->posts()->saveMany(factory(App\Post::class, 5)->make());// nad u daj mi relaciju posts i 
            //sacuvaj podatke sa saveMany, (ovde cemo imati id)
            //rezultat ovoga je da za svakoga korisnika cemo imati 5 postova 
        });
    }
}
