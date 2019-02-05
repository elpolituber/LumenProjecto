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

$router->get('/', function () use ($router) {
    return $router->app->version();
});


    //Usuarios
        $router->post('/login', ['uses' =>'UserController@validarUsuario']);
        $router->post('/users', ['uses' => 'UserController@post']);
        $router->get('/users', ['uses' => 'UserController@get']);
        $router->delete('/users', ['uses' => 'UserController@eliminarUsuario']);
        
    //publicaciones
        $router->put('/publications', ['uses' => 'PublicacionController@editarPublicacion']);
        $router->post('/publications', ['uses' =>'PublicacionController@crearPublicacion']);
        $router->delete('/publications',['uses' => 'PublicacionController@eliminarPublicacion']);
        $router->get('/publications',['uses' =>'PublicacionController@mostrarPublicacion']);
    
