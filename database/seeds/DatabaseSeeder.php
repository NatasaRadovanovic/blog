<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class); //otkomentarisemo, bilo je zakomentarisano za usera
         $this->call(PostsTableSeeder::class);//ovo pozivamo za sledecu za post
         $this->call(CommentsTableSeeder::class); 
    }
}
