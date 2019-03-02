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

Route::resource('Products', 'ProductController')->middleware('auth','role:ROL_ADMINISTRADOR');

Route::resource('Services', 'ServiceController')->middleware('auth','role:ROL_ADMINISTRADOR');


//-------------------------------------Clientes----------------------------------------//

 Route::resource('Clients', 'ClientController');
 //Seguridad
Route::get('Clients','ClientController@index')->name('Clients.index')->middleware('role:ROL_ADMINISTRADOR');
Route::get('Clients/{id}','ClientController@show')->name('Clients.show')->middleware('auth','role:ROL_CLIENTE|ROL_ADMINISTRADOR');
Route::get('Clients/{id}/edit','ClientController@edit')->name('Clients.edit')->middleware('auth','role:ROL_CLIENTE|ROL_ADMINISTRADOR');
Route::put('Clients/{id}','ClientController@update')->name('Clients.update')->middleware('auth',['role:ROL_CLIENTE|ROL_ADMINISTRADOR']);
//--------------------------------------------------------------------------------------//


Route::resource('Mechanics', 'MechanicController');



Route::resource('Permissions', 'PermissionController')->middleware('role:ROL_ADMINISTRADOR');

Route::resource('Sales', 'SaleController')->except(['edit', 'update']);

Route::resource('Vehicles', 'VehicleController');
Route::get('Vehicles','VehicleController@index')->name('Vehicles.index')->middleware('role:ROL_ADMINISTRADOR');
//------------------------------------Citas--------------------------------------------//
Route::resource('Appointments', 'AppointmentController');
Route::get('Appointments','AppointmentController@index')->name('Appointments.index')->middleware('auth','role:ROL_ADMINISTRADOR');
Route::get('Appointments/assignation/{id}', 'AppointmentController@assignation')->middleware('auth','role:ROL_ADMINISTRADOR');
Route::put('Appointments/assignationUpdate/{id}', 'AppointmentController@assignationUpdate')->name('Appointments.assignationUpdate')->middleware('auth','role:ROL_ADMINISTRADOR');
Route::put('Appointments/updateAttended/{id}', 'AppointmentController@updateAttended')->name('Appointments.updateAttended')->middleware('auth','role:ROL_ADMINISTRADOR');
//-------------------------------------------------------------------------------------//

//-------------------------------------Usuarios-----------------------------------------//
Route::resource('Users', 'UserController')->middleware('auth');
Route::post('Users/register', 'UserController@register')->name('Users.register')->middleware('auth','role:ROL_ADMINISTRADOR');





Route::get('Mechanics/assignationShow/{id}', 'MechanicController@assignedShow')->middleware('auth');
Route::resource('Roles', 'RoleController')->middleware('role:administrador');;

Route::resource('Permission_roles', 'PermissionRoleController')->middleware('auth','role:administrador');

Route::resource('Role_users', 'RoleUserController')->middleware('auth','role:administrador');



Route::resource('Sales', 'SaleController');

Route::get('Product/getProduct/{code}', 'ProductController@getProductByCode')->name('Product.getcode')->middleware('auth');
Route::get('Service/getService/{code}', 'ServiceController@getServiceByCode')->name('Service.getcode')->middleware('auth');

//Exportar
// Rutas---> Le doy un nombre, una url, luego le digo que cuando ingrese a esa url, vaya al controlador
// en este caso UserController e ingrese al metodo exportUsersPdf
// Luego de esto ir al Admin/Users/aside.blade.php, donde se crearan lo botones que generaran los pdf o los exceles

Route::get("/usersPdf", "UserController@exportUsersPdf")->middleware('auth');

Route::get("/usersExcel", "UserController@exportUsersExcel")->middleware('auth');
