<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/**
 * Registra um novo usuário
 */
Route::post('register', 'UserController@store');

Route::middleware('auth:api')->group(function() {
    
    /**
     * Recursos para pautas
     */
    Route::resource('pautas', 'PautaController');
    
    /**
     * Recursos para usuários
     */
    Route::get('users', 'UserController@index');
    Route::get('users/{user}', 'UserController@show');
    Route::put('users/{user}', 'UserController@update');
    Route::delete('users/{user}', 'UserController@destroy');
    Route::get('/user/me', function (Request $request) {
        return $request->user();
    });
        
    /**
     * Recurso para logout
     */
    Route::get('tokens/revoke', 'UserController@logout');
});


/**
 * Recursos para recuperação de senha
 */
Route::group(['namespace' => 'Auth', 'middleware' => 'api', 'prefix' => 'password'], function () {    
    /**
     * Solicitação de password reset
     */
    Route::post('create', 'PasswordResetController@create');

    /**
     * Acessando o token do e-mail
     */
    Route::get('find/{token}', 'PasswordResetController@find');

    /**
     * Redefinindo nova senha
     */
    Route::post('reset', 'PasswordResetController@reset');
});