<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function() {
    Route::post('registro', 'AuthenticatorController@register');
    Route::post('login', 'AuthenticatorController@login');

    Route::middleware('auth:api')->group(function() {
        Route::post('logout', 'AuthenticatorController@logout');
    });
});

Route::get('produtos', 'ProductController@index')->middleware('auth:api');
Route::get('categorias', 'CategoryController@index')->middleware('auth:api');
