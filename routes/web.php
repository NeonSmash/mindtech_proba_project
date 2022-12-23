<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$router->get('/movies', 'MoviesController@index');
$router->get('/movies/toprated', 'MoviesController@toprated');
$router->get('/movies/{id}', 'MoviesController@show');
$router->post('/movies/create', 'MoviesController@store');


$router->put('/movies/update/{id}', 'MoviesController@update');
$router->delete('/movies/delete/{id}', 'MoviesController@destroy');



$router->get('/', function () use ($router) {
    //return $router->app->version();
    echo "Helló világ!";
});
