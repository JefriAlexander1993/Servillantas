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
Route::get('allAppointments', 'AppointmentController@allAppointments')->name('Appointments.allAppointments')->middleware('auth','role:ROL_MECANICO|ROL_ADMINISTRADOR');

Route::group(['prefix' => '/', 'middleware' => ['auth','role:ROL_ADMINISTRADOR']], function() {

 
	//-------------------------------------Citas----------------------------//
    //Index 
	Route::get('Appointments','AppointmentController@index')->name('Appointments.index');
	//Asignar personalizada
	Route::get('Appointments/assignation/{id}', 'AppointmentController@assignation');
	//Actualizar personalizada
	Route::put('Appointments/assignationUpdate/{id}', 'AppointmentController@assignationUpdate')->name('Appointments.assignationUpdate');
	//Actualizar atendida o no-personalizada
	//------------------------------------Mecanicos--------------------------//
	Route::get('Mechanics','MechanicController@index')->name('Mechanics.index');
	Route::delete('Mechanics/{id}','MechanicController@destroy')->name('Mechanics.destroy');

	//-----------------------------Usuarios---------------------------------------//
	Route::resource('Users', 'UserController');
	Route::post('Users/register', 'UserController@register')->name('Users.register');
	//-----------------------------Roles---------------------------------------//
	Route::resource('Roles', 'RoleController');
	//-----------------------------Permisos_roles---------------------------------------//
	Route::resource('Permission_roles', 'PermissionRoleController');
	//-----------------------------Roles_Permisos---------------------------------------//
	Route::resource('Role_users', 'RoleUserController');
	//------------------------------Permisos--------------------------------------------//
	Route::resource('Permissions', 'PermissionController');
	//-------------------------------------Ventas---------------------------------------//
	Route::resource('Sales', 'SaleController')->except(['edit', 'update']);
	//-------------------------------------Productos---------------------------------------//
	Route::get('Product/getProduct/{code}', 'ProductController@getProductByCode')->name('Product.getcode');
	Route::get('Service/getService/{code}', 'ServiceController@getServiceByCode')->name('Service.getcode');
	Route::resource('Products', 'ProductController')->middleware('auth','role:ROL_ADMINISTRADOR');
	//--------------------------------------Servicios---------------------------------------//
	Route::resource('Services', 'ServiceController')->middleware('auth','role:ROL_ADMINISTRADOR');
	//----------------------------------------Pdf--------------------------------------------//
	Route::get("/usersPdf", "UserController@exportUsersPdf");
	
	Route::get("/salesProductPdf", "SaleController@exportSalesProduct");
	Route::get("/salesServicePdf", "SaleController@exportSalesService");
	Route::get("/salesProductServicePdf", "SaleController@exportSalesServiceProduct");
	Route::get("/usersExcel", "UserController@exportUsersExcel");
	//----------------------------------------Mecanico---------------------------------------//
	Route::get('Mechanics/assignationShow/{id}', 'MechanicController@assignedShow');
	//-----------------------------------Clientes---------------------------//
    Route::get('Clients','ClientController@index')->name('Clients.index')->middleware('auth','role:ROL_ADMINISTRADOR');
	Route::delete('Clients/{id}','ClientController@destroy')->name('Clients.destroy')->middleware('auth','role:ROL_ADMINISTRADOR');
	
	 //------------------------------------Vehiculos--------------------------//
	Route::get('Vehicles','VehicleController@index')->name('Vehicles.index');
	Route::delete('Vehicles/{id}','VehicleController@destroy')->name('Vehicles.destroy');
	

}); 

Route::group(['prefix' => '/', 'middleware' => ['auth','role:ROL_CLIENTE|ROL_ADMINISTRADOR']], function() {
	
	//-------------------------------------Clientes-----------------------------------------
	Route::get('Clients/{id}','ClientController@show')->name('Clients.show');
	Route::get('Clients/{id}/edit','ClientController@edit')->name('Clients.edit');
	Route::get('Clients/{id}/editClient','ClientController@editClient')->name('Clients.editClient');
	Route::put('Clients/{id}','ClientController@update')->name('Clients.update');

	Route::put('ClientUpdate/{id}','ClientController@updateClient')->name('Clients.updateClient');

	//---------------------------------------Citas-----------------------------------------//
	//Crear
	Route::get('Appointments/create', 'AppointmentController@create')->name('Appointments.create');
	//Actualizar
	Route::put('Appointments/{id}', 'AppointmentController@update')->name('Appointments.update');
	//Guardar
	Route::post('Appointments', 'AppointmentController@store')->name('Appointments.store');

	//Editar
	Route::get('Appointments/{id}/edit', 'AppointmentController@edit')->name('Appointments.edit');
	//Eliminar
	Route::delete('Appointments/{id}', 'AppointmentController@destroy')->name('Appointments.destroy');
	//Ver
	Route::get('Appointments/{id}', 'AppointmentController@show')->name('Appointments.show');
	// Ver mis citas.
	Route::get('myAppointments', 'AppointmentController@myAppointments')->name('Appointments.myAppointments');

	//-----------------------------------------Vehiculos-----------------------------------//
	Route::get('Vehicles/create','VehicleController@create')->name('Vehicles.create');
	Route::post('Vehicles','VehicleController@store')->name('Vehicles.store');
	Route::get('Vehicles/{id}','VehicleController@show')->name('Vehicles.show');
	Route::get('Vehicles/{id}/edit','VehicleController@edit')->name('Vehicles.edit');
	Route::put('Vehicles/{id}','VehicleController@update')->name('Vehicles.update');

}); 


//-------------------------------------------------------------------------------------//

Route::group(['prefix' => '/', 'middleware' => ['auth','role:ROL_MECANICO|ROL_ADMINISTRADOR']], function() {
 	
 	Route::get('Mechanics/assignationShow/{id}', 'MechanicController@assignedShow');
 	//------------------------------------Mecanicos--------------------------//
	Route::get('Mechanics/{id}','MechanicController@show')->name('Mechanics.show');

	Route::get('MechanicsPerfil/{id}','MechanicController@showMecanic')->name('Mechanics.showMecanic');
	
	Route::get('Mechanics/{id}/edit','MechanicController@edit')->name('Mechanics.edit');
	Route::put('Mechanics/{id}','MechanicController@update')->name('Mechanics.update');
		Route::put('Appointments/updateAttended/{id}', 'AppointmentController@updateAttended')->name('Appointments.updateAttended');
});

	
	//------------------------------------Vehiculos-------------------------//

//Exportar
// Rutas---> Le doy un nombre, una url, luego le digo que cuando ingrese a esa url, vaya al controlador
// en este caso UserController e ingrese al metodo exportUsersPdf
// Luego de esto ir al Admin/Users/aside.blade.php, donde se crearan lo botones que generaran los pdf o los exceles


