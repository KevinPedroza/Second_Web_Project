<?php

//this is gonna have all the paths to normal views
Route::get('/', function () {
    return view('index');
});
Route::get('/viewregister', function () {
    return view('register');
});
Route::get("cliente", function () {
    return view('cliente');
});
Route::get("vercompras", function () {
    return view('vercompras');
});
Route::get("items/obteneridVenta/{idventa}", function ($idventa) {
    $idventa = $idventa;
    return view("items",compact("idventa"));
});

Auth::routes();

//this is gonna have all the controllers with their functions
Route::get("login",'LoginController@login')->name("login");
Route::get('vistaproductos/obtenerCategoriaId/{idcate}', 'VistaProductoController@obtenerCategoriaId')->name("obtenerCategoriaId");
Route::get('productosingle/obtenerProductoId/{idpro}/{idcate}', 'ProductoSingleController@obtenerProductoId')->name("obtenerProductoId");
Route::get("cerrar",'CerrarController@cerrar')->name("cerrar");
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', function () {
    if(Session::has("adminsession")){
        return view("admin");
    }
    else{
        return back()->withErrors(['password' => "No tienes Permisos de Administrador!"]);
    }   
});

//this is gonna have the resources controllers
Route::resource("register",'UserRegister');
Route::resource("categoria",'CategoriaController');
Route::resource("producto",'ProductoController');
Route::resource("lista",'ListaController');
Route::resource("compra",'CompraController');


