<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@authenticate');
Route::get('open', 'DataController@open');
Route::resource('CategoryValue', 'BcategoryController');

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('user', 'AuthController@getAuthenticatedUser');
    Route::get('closed', 'DataController@closed');
});
