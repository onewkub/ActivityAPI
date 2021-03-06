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
Route::get('/require/{year}', 'RequireController@show');
Route::get('/totalhour/{year}', 'TotalHourController@show');
Route::post('/totalhour', 'TotalHourController@store');
Route::put('/totalhour/{year}', 'TotalHourController@update');
Route::post('/join_activity/{activity}', 'JoinActivityController@store');
Route::get('/student/{uid}', 'StudentController@show');
Route::get('/loginwithtoken/{token}', 'Auth\loginController@loginWithToken');
Route::get('/getstudentactivity/{studentID}', 'ActivityController@getStudentActivity');
Route::get('/activitystudent/{aid}', 'StudentController@getStudentActivity');