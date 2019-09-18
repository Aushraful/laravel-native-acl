<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(/*['verify' => true]*/);

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('back-end/dashboard');
})/*->middleware('verified')*/;

Route::group(['middleware' => 'auth'], function () {

    //---------------- User, Role, Permission Start ----------------------------------------------

    Route::resource('/users', 'UserController');
    Route::post('/users/statuscontroll/{id}', 'UserController@statuscontroll')->name('users.statuscontroll');


    Route::resource('/roles', 'RoleController');


    Route::resource('/permissions', 'PermissionController');

    //---------------- User, Role, Permission End ------------------------------------------------

    //---------------- Authorization Start -------------------------------------------------------

    Route::get('/assign-user-role', 'AuthorizationController@view_user_roles');
    Route::post('/assign-user-role', 'AuthorizationController@update_user_roles');

    Route::get('/assign-role-permission', 'AuthorizationController@view_role_permissions');
    Route::post('/assign-role-permission', 'AuthorizationController@update_role_permissions');

    Route::get('/assign-user-permission', 'AuthorizationController@view_user_permissions');
    Route::post('/assign-user-permission', 'AuthorizationController@update_user_permissions');

    //----------------- Authorization End --------------------------------------------------------

});
