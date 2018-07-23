<?php 
$factory->define(App\Comment::class, function($faker)
{
    return [
        'author' => $faker->name,
        'text' => $faker->text(30)
    ];
});
?>