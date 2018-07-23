<?php
$factory->define(App\Post::class, function (Faker\Generator $faker) {

    return [
         'title' => $faker->sentences(1, true), //1 komad
         'body' => $faker->text(255),
         'published' => true
    ];
});
?>