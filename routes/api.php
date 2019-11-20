<?php


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
Route::apiResource('/article', 'ArticleController');
Route::post('/register', 'Auth\RegisterController@userRegister');
Route::post('/admin_register', 'Auth\RegisterController@adminRegister');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout');
Route::apiResource('/activity', 'ActivityController');
// Route::middleware('auth:api')
//     ->get('/user', function (Request $request) {
//         return $request->user();
//     });