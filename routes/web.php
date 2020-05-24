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
$router->group(['prefix' => 'api'], function () use ($router) {

    // Авторизация
    $router->post('/login', 'AuthController@login');


    // Все остальное под авторизацией
    $router->group(['middleware' => 'auth'], function ($router) {
        // Товары
        $router->group(['prefix' => 'items'], function () use ($router) {
            $router->get('/', 'ItemController@list');
            $router->get('/{id}', 'ItemController@get');
            $router->post('/create', 'ItemController@create');
            $router->post('/delete', 'ItemController@delete');
        });

        // Пользователи
        $router->group(['prefix' => 'users'], function () use ($router) {
            $router->post('/create', 'UserController@create');
            $router->post('/update', 'UserController@update');
            $router->post('/delete', 'UserController@delete');
            $router->get('/', 'UserController@list');
            $router->get('/{id}', 'UserController@get');
        });

        // Роли
        $router->group(['prefix' => 'roles'], function () use ($router) {
            $router->get('/', 'RoleController@list');
            $router->get('/{id}', 'RoleController@get');
            $router->post('/delete', 'RoleController@delete');
            $router->post('/create', 'RoleController@create');
        });
    });
});
