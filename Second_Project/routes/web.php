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
    return view('index');
});

Route::get('/viewregister', function () {
    return view('register');
});


Auth::routes();

Route::get("login",'LoginController@login')->name("login");


Route::get('/admin', function () {
    if(Session::has("adminsession")){
        return view("admin");
    }
    else{
        return redirect("/");
    }   
});

Route::resource("register",'UserRegister');
Route::resource("categoria",'CategoriaController');
Route::resource("producto",'ProductoController');

Route::get("cliente", function () {
    return view('cliente');
});


Route::get("cerrar",'CerrarController@cerrar')->name("cerrar");
Route::get('/home', 'HomeController@index')->name('home');
