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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Calendary', 'AppointmentController@calendary');

Route::resource('Products','ProductController');

Route::resource('Services','ServiceController');

Route::resource('Employee','EmployeeController');

Route::resource('Clients','ClientController');

Route::resource('Permissions','PermissionController');

Route::resource('Sales','SaleController');

Route::resource('Vehicles','VehicleController');

Route::resource('Appointments','AppointmentController');

Route::resource('Users','UserController');
Route::post('Users/register','UserController@register')->name('Users.register');

Route::resource('Roles','RoleController');

Route::resource('Permission_roles','PermissionRoleController');

Route::resource('Role_users','RoleUserController');

Route::resource('Mechanics','MechanicController');
