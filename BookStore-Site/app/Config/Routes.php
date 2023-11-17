<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('inicio');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

/*$routes->get('/', 'Home::index');
$routes->get('/principal', 'Home::principal');
$routes->get('/plantilla', 'Home::plantilla');

$routes->get('/nueva_plantilla', 'Home::nueva_plantilla');
$routes->get('/cabecera', 'Home::cabecera');
$routes->get('/piePagina', 'Home::piePagina');
$routes->get('/prueba', 'Home::prueba');*/


//-------------------Home ---------------------------------
$routes->get('/', 'Home::inicio');
$routes->get('/inicio', 'Home::inicio');
$routes->get('/quienesSomos', 'Home::quienesSomos');
$routes->get('/comercializacion', 'Home::comercializacion');
$routes->get('/terminosUsos', 'Home::terminosUsos');
$routes->get('/contacto', 'Home::contacto');

//-------------------UsuarioController---------------------------------

//registro
$routes->get('/registro', 'UsuarioController::registro');
$routes->post('/guardar', 'UsuarioController::guardar');

//inicioSession
$routes->get('/inicioSession', 'UsuarioController::inicioSession');
$routes->post('/login', 'UsuarioController::login');

//salir del sistemas
$routes->get('/salir', 'UsuarioController::salir');

//-------------------ProductoController---------------------------------

//Crud de productos

//lista los productos
$routes->get('/listar', 'ProductoController::listarProducto');
//agrega productos
$routes->get('/agregarProductos1', 'ProductoController::agregarProductos');
//guardar la informacion de agregar producto
$routes->post('/guardarProducto', 'ProductoController::guardarProducto');
//borra un producto
$routes->get('borrar/(:num)', 'ProductoController::borrar/$1');
//editar productos
$routes->get('modificar/(:num)', 'ProductoController::modificar/$1');
$routes->post('/actualizar', 'ProductoController::actualizar');
$routes->get('/eliminados', 'ProductoController::eliminados');
$routes->get('altaProd/(:num)', 'ProductoController::altaProd/$1');
$routes->get('/buscarProductos', 'ProductoController::buscarProductos');


$routes->get('mostrarPorCategoria/(:num)', 'ProductoController::mostrarPorCategoria/$1');

//-------------------CategoriaController---------------------------------

//Crud de categoria productos

//lista las categorias
$routes->get('/categorias', 'CategoriaController::listarCategorias');
//agrega las categorias productos
$routes->get('/agregarCategoria', 'CategoriaController::agregarCategoria');

$routes->post('/guardarCategoria', 'CategoriaController::guardarCategoria');
//editar categorias
$routes->get('modificarCategoria/(:num)', 'CategoriaController::modificarCategoria/$1');
$routes->post('/actualizarCategoria', 'CategoriaController::actualizarCategoria');
//baja de categoria
$routes->get('bajaCategoria/(:num)', 'CategoriaController::bajaCategoria/$1');
$routes->get('altaCategoria/(:num)', 'CategoriaController::altaCategoria/$1');
$routes->get('/cateEliminado', 'CategoriaController::cateEliminado');

$routes->get('/obtenerCategorias', 'CategoriaController::obtenerCategorias');


//-------------------ConsultaController---------------------------------
$routes->get('/consultas', 'ConsultaController::vistaConsulta');
$routes->get('/listarConsulta', 'ConsultaController::listarConsulta');
$routes->post('/guardarConsulta', 'ConsultaController::guardarConsulta');
$routes->post('/actualizarConsulta', 'ConsultaController::actualizarConsulta');


//-------------------FacturaController---------------------------------
$routes->get('mostrarCabeceraFactura/(:num)', 'FacturaController::mostrarCabeceraFactura/$1');
$routes->get('/ventas', 'ventaController::listarVentas');

//ver catalogo
$routes->get('/catalogo', 'ProductoController::catalogo2');
$routes->get('catalogo/(:num)', 'ProductoController::catalogo2/$1');

//-------------------CarritoController---------------------------------
$routes->post('/agregarCarrito', 'carritoController::agregarCarrito');
$routes->get('/carrito', 'carritoController::carrito');
$routes->get('eliminarElemento(:any)', 'carritoController::eliminarElemento/$1');
$routes->get('/cancelarCompra', 'CarritoController::cancelarCompra');
$routes->get('/confirmarCompra', 'CarritoController::confirmarCompra');

//-------------------AdministradorController---------------------------------

$routes->get('/vistaAdmin', 'AdminController::vistaAdmin');
$routes->get('/inicioAdmin', 'AdminController::vistaAdmin');
$routes->get('/editarPerfil', 'AdminController::editarPerfil');
$routes->get('/verCatalogoAdministrador', 'AdminController::verCatalogoAdministrador');


//Crud de usuarios

//lista los usuarios
$routes->get('/listarClientes', 'AdminController::listarClientes');
//borra un producto
$routes->get('borrarClientes/(:num)', 'AdminController::borrarClientes/$1');
$routes->get('altaCliente/(:num)', 'AdminController::altaCliente/$1');
$routes->get('/clientesBaja', 'AdminController::clientesBaja');


//agrega productos
// $routes->get('/agregarProductos', 'ProductoController::agregarProductos');
// //guardar la informacion de agregar producto
// $routes->post('/guardar', 'ProductoController::guardar');








/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {

}
