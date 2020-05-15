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

$router->group(['prefix' => 'v1', 'namespace' => 'Api\v1'], function() use($router)
{

    $router->get('doctors','DoctorController@index');
    $router->post('doctors','DoctorController@store');
    $router->get('doctors/{renewal}','DoctorController@show');
    $router->put('doctors/{renewal}','DoctorController@update');
    $router->patch('doctors/{renewal}','DoctorController@update');
    $router->delete('doctors/{renewal}','DoctorController@destroy');
    $router->delete('doctors/{renewal}','DoctorController@destroy');
});
