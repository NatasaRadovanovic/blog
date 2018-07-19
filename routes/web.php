<?php
use App\Posts;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', 'PostController@index'); //pozivamo metodu iz kontrolera,tako se poziva
//ime kontrolera pa @naziv metode koja to nesto radi
//vise ono sto je u webu bilo ne pise ovde vec u kontroleru a ovde samo pozovemo tu metodu tj fju
Route::get('/posts/create', 'PostController@create');// da je ovo ispod posts/id ne bi
// radilo jer bi  upao prvo u posts/id a ne posts/create a ide redom kada ulazi u rute
Route::get('/posts/{id}', 'PostController@show');
Route::post('/posts', 'PostController@store'); // po konvenciji store naziv metode
Route::post('/posts/{id}', 'CommentController@store');

Route::get('/register', 'RegisterController@create');
Route::post('/register', 'RegisterController@store');

Route::get('/logout', 'LoginController@destroy');

Route::get('/login', 'LoginController@create')->name('login'); //mora da se imenuje inace ako nismo ulogovani
//i hocemo create post dugme vraca na login, inace bez ovoga name izbacuje gresku
Route::post('/login', 'LoginController@store');




