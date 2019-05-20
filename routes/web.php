<?php

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

$router->group(['prefix' => 'user'], function () use ($router) {
    $router->get('list', 'UserController@list');
    $router->post('create', 'UserController@create');
    $router->post('update/{id}', 'UserController@update');
    $router->get('details/{id}', 'UserController@details');
    $router->delete('delete/{id}', 'UserController@delete');
});
