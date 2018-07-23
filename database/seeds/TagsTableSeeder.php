<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            'Blogging',
            'Freelancig',
            'How to Succed',
            'Internet Marketing',
            'Miscellaneous'
        ];

        App\Tag::truncate(); //brise podatke iz tabele, ali ne celu tabelu

        foreach($values as $value)
        {
            App\Tag::create([
                'name' => $value
            ]);
        }

        App\Post::all()->each(function(App\Post $p) use ($values) 
        {
            $rndIds = App\Tag::inRandomOrder()->select('id')->take(3)->pluck('id');
            $p->tags()->attach($rndIds); 
        }); //use da bi video ovo iznad eacha
        // pluck id pravi niz id, select, uzima id iz baze,iskljucivo se odnosi na mySql upit
        //kao da napisali select all from...a takes je limit od 3 id-a
    }
}
