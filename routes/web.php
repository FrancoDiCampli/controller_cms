<?php

use App\Pagina;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('categorias', 'CategoriasController');
Route::resource('paginas', 'PaginasController');
Route::resource('parrafos', 'ParrafosController');

Route::get('crear/{pagina}','ParrafosController@crear')->name('parrafos.crear');

Route::resource('sitio','WebController');

Route::get('home',function(){
    $tratamientos = Pagina::where('categoria_id',1)->get();
    $productos = Pagina::where('categoria_id',2)->get();
    $servicios = Pagina::where('categoria_id',3)->get();
    return view('layouts.web', compact('tratamientos','productos','servicios'));
});
