<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


//Logueo y deslogueo de la aplicación
Route::controller('login', 'LoginController');

Route::post('login', ['uses' => 'LoginController@postLogin', 'before' => 'guest']);

Route::get('Admin/Principal', function()
{
		return View::make('admin.principal');
	
});

Route::get('404', function()
{
		return View::make('404');
	
});

Route::get('agro_admin','LoginController@getIndex');

Route::any('logout','LoginController@getLogout');

Route::controller('usuarios', 'UsuariosController');

//Pagina
Route::get('/','PaginaController@getIndex');
Route::get('Videos','PaginaController@videos');
Route::get('verVideo/{id}','VideosController@verVideo');
Route::get('Marcas','PaginaController@marcas');
Route::get('Productos','PaginaController@productos');
Route::get('verProducto/{id}/{nombre}','PaginaController@verProducto');
Route::get('verServicio/{tipo}','PaginaController@verServicio');
Route::get('Servicios','PaginaController@Servicios');
Route::get('areaNegocios','PaginaController@areaNegocios');
Route::get('Contacto','PaginaController@getContacto');
Route::post('Contacto','PaginaController@enviarMensaje');
Route::get('Noticias/{tipo}','PaginaController@getNoticias');
Route::get('PlantasBeneficio/{id}','PaginaController@getPlantaBeneficio');
Route::get('Buscar','PaginaController@getBusqueda');
Route::get('verNoticia/{id}','PaginaController@verNoticia');


//Usuarios
Route::get('Admin/Usuarios','UsuariosController@getIndex');

//Noticias
Route::post('Admin/modificarNoticia','NoticiasController@postModificarNoticia');
Route::get('Admin/modificarNoticia/{id}','NoticiasController@getModificarNoticia');
Route::get('Admin/eliminarNoticia/{id}','NoticiasController@elminarNoticia');
Route::post('Admin/agregarNoticia','NoticiasController@postAgregarNoticia');
Route::get('Admin/agregarNoticia','NoticiasController@getAgregarNoticia');
Route::get('Admin/Noticias','NoticiasController@getIndex');

//Servicios
Route::post('Admin/modificarServicio','ServiciosController@postModificarServicio');
Route::get('Admin/modificarServicio/{id}','ServiciosController@getModificarServicio');
Route::get('Admin/eliminarServicio/{id}','ServiciosController@elminarServicio');
Route::post('Admin/agregarServicio','ServiciosController@postAgregarServicio');
Route::get('Admin/agregarServicio','ServiciosController@getAgregarServicio');
Route::get('Admin/Servicios','ServiciosController@getIndex');

//Familias
Route::post('Admin/modificarFamilia','FamiliasController@postModificarFamilia');
Route::get('Admin/modificarFamilia/{id}','FamiliasController@modificarFamilia');
Route::get('Admin/eliminarFamilia','FamiliasController@eliminarFamilia');
Route::post('Admin/Familias','FamiliasController@postAgregarFamilia');
Route::get('Admin/Familias','FamiliasController@getIndex');

//Categorias
Route::post('Admin/modificarCategoria','CategoriasController@postModificarCategoria');
Route::get('Admin/modificarCategoria/{id}','CategoriasController@modificarCategoria');
Route::get('Admin/eliminarCategoria','CategoriasController@eliminarCategoria');
Route::post('Admin/Categorias','CategoriasController@postAgregarCategoria');
Route::get('Admin/Categorias','CategoriasController@getIndex');

//Subcategorias
Route::post('Admin/modificarSubcategoria','SubcategoriasController@postModificarSubcategoria');
Route::get('Admin/modificarSubcategoria/{id}','SubcategoriasController@modificarSubcategoria');
Route::get('Admin/eliminarSubcategoria','SubcategoriasController@eliminarSubcategoria');
Route::post('Admin/Subcategorias','SubcategoriasController@postAgregarSubcategoria');
Route::get('Admin/Subcategorias','SubcategoriasController@getIndex');

//Empresas
Route::post('Admin/modificarEmpresa','EmpresasController@postModificarEmpresa');
Route::get('Admin/modificarEmpresa/{id}','EmpresasController@modificarEmpresa');
Route::get('Admin/eliminarEmpresa','EmpresasController@eliminarEmpresa');
Route::post('Admin/Empresas','EmpresasController@postAgregarEmpresa');
Route::get('Admin/Empresas','EmpresasController@getIndex');

//Productos
Route::post('Admin/actualizarProducto','ProductosController@postActualizarProducto');
Route::get('Admin/actualizarProducto/{id}','ProductosController@getActualizarProducto');
Route::get('Admin/agregarProducto','ProductosController@agregarProducto');
Route::get('Admin/eliminarProducto','ProductosController@eliminarProducto');
Route::post('Admin/agregarProducto','ProductosController@postAgregarProducto');
Route::get('Admin/Productos','ProductosController@getIndex');

//Galeria
Route::get('Admin/eliminarImagen/{id}','PaginaController@eliminarImagen');
Route::post('Admin/Galeria','PaginaController@postGaleria');
Route::get('Admin/Galeria','PaginaController@galeria');

//Videos
Route::get('Admin/eliminarVideo/{id}','VideosController@eliminarVideo');
Route::post('Admin/Videos','VideosController@postAgregarVideo');
Route::get('Admin/Videos','VideosController@getIndex');

//funcion

Route::post('Admin/Funcion','FuncionController@postFuncion');
Route::get('Admin/Funcion','FuncionController@getIndex');

Route::post('filtrarProductos','ProductosController@filtrarProductos');



