<?php

use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

// EJERCICIO 2 //

/* Route::get('/', function(){

	return 'Pantalla principal';

});

Route::get('login', function(){

	return 'Login usuario';

});

Route::get('logout', function(){

	return 'Logout usuario';

});

Route::get('productos', function(){

	return 'Listado productos';

});

Route::get('productos/show/{id}', function($id){

	return 'Vista detalle producto ' . $id;

});

Route::get('productos/create', function(){

	return 'Añadir productos';

});

Route::get('productos/edit/{id}', function($id){

	return 'Modificar producto ' . $id;

}); */

// ... //


// EJERCICIO 4 //

/* Route::get('/', function(){

	return view('home');

});

Route::get('login', function(){

	return view('auth.login');

});

Route::get('logout', function(){

	return 'Logout usuario';

});

Route::get('productos', function(){

	return view('productos.index');

});

Route::get('productos/show/{id}', function($id){

	return view('productos.show', array('id' => $id));

});

Route::get('productos/create', function(){

	return view('productos.create');

});

Route::get('productos/edit/{id}', function($id){

	return view('productos.edit', array('id' => $id));

}); */

// ... //


// CONTROLADORES //

Route::get('/', 'App\Http\Controllers\HomeController@index');

/* Route::get('login', function(){

	return view('auth.login');

});

Route::get('logout', function(){

	return 'Logout usuario';

}); */

/* Route::get('productos', 'App\Http\Controllers\ProductoController@getIndex');

Route::get('productos/show/{id}', 'App\Http\Controllers\ProductoController@getShow');

Route::get('productos/create', 'App\Http\Controllers\ProductoController@getCreate');

Route::get('productos/edit/{id}', 'App\Http\Controllers\ProductoController@getEdit'); */

Route::group(['middleware' => 'auth'], function(){

	Route::get('productos', 'App\Http\Controllers\ProductoController@getIndex');

	Route::get('productos/show/{id}', 'App\Http\Controllers\ProductoController@getShow');

	Route::get('productos/create', 'App\Http\Controllers\ProductoController@getCreate');
	Route::post('productos/create', 'App\Http\Controllers\ProductoController@postCreate');

	Route::get('productos/edit/{id}', 'App\Http\Controllers\ProductoController@getEdit');
	Route::put('productos/edit', 'App\Http\Controllers\ProductoController@putEdit');

	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Auth::routes();

// ... //
