<?php
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) { //$factory globalna promenljiva
    // sa define mapiramo, generator zna kome da posaljemo, kad se klikne na generator
    //treba da se dobije lista svega i svacega
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),//ako hocemo da se ulogujemo
        //a u bazi su nam pasvori kriptovani, u ovom slucaju pas za sve te nove je strin secret
        //zbog ovoga u zagradi, tu moze biti bilo sta, 'aaa' onda je aaa pasvord
        'remember_token' => str_random(10),
    ];
});



