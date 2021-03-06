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

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->group([
    'prefix' => 'api/clients'
],function () use($app){
    $app->get('','ClientsController@index');
    $app->get('{id}','ClientsController@show');
    $app->post('','ClientsController@store');
    $app->put('{id}','ClientsController@update');
    $app->delete('{id}','ClientsController@destroy');

});