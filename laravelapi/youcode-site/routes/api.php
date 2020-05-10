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
// categorie 
// Route::get('/category','CategoryController@index');
// Route::post('/category','CategoryController@store');
// Route::put('/category/{id}','CategoryController@update');
// Route::delete('/category/{id}','CategoryController@destroy');
// Route::get('/category/{id}','CategoryController@show');
// or in 1 line

// article
// Route::get('/article','ArticleController@index');
// Route::post('/article','ArticleController@store');
// Route::put('/article/{id}','ArticleController@update');
// Route::delete('/article/{id}','ArticleController@destroy');
// Route::get('/article/{id}','ArticleController@show');



// comment

// Route::get('/comment','CommentController@index');
// Route::post('/comment','CommentController@store');
// Route::put('/comment/{id}','CommentController@update');
// Route::delete('/comment/{id}','CommentController@destroy');
// Route::get('/comment/{id}','CommentController@show');
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'ApiController@login');
Route::post('register', 'ApiController@register');

Route::apiResource('/article','ArticleController');
Route::apiResource('/category','CategoryController');
Route::group(['middleware' => 'auth.jwt'], function () {
    Route::apiResource('/comment','CommentController');

});

