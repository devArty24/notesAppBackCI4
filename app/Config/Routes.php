<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true); //para "bloquear" la manera en como se accedia a las rutas en la version ci3 cambiar a false

$routes->group('api', function($routes){
    $routes->resource('notes'); //esto ya incluye todas las rutas, aunque tambien se peden hacer una por una
    /*Revisa https://codeigniter.com/user_guide/incoming/restful.html hasta el final biene la tabla de ejemplo de las rutas que "remplaza"
      la linea de arriba.
      **NOTA: personalmente no me funcion del todo el $routes->resource ya que en la documentacion mensiona que no es necesario colocar en la url la accion
      por ejemplo /notes/create si no que con solo /photos y el metodo correcto en automatico sabe a donde ir pero en mi caso tuve que colocar el create, update, delete
      no es del todo un error es mas para tomarse en cuenta puede ser por la version de CI
    */
});

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
