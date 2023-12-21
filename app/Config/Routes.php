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
$routes->setDefaultController('Users');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
//$routes->setAutoRoute(true);
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
$routes->match(['get', 'post'], '/', 'Users::index', ['filter' => 'noauth']);
$routes->match(['get', 'post'], 'register', 'Users::register', ['filter' => 'noauth']);
$routes->get('logout', 'Users::logout');
$routes->get('home', 'Home::index', ['filter' => 'auth']);
$routes->get('recipes', 'Recipes::index', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'recipes/add', 'Recipes::add', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'profile', 'Profile::index', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'recipes/add_ingredients/(:num)', 'Recipes::add_ingredients/$1', ['filter' => 'auth']);
$routes->get('recipes/view/(:num)', 'Recipes::view/$1', ['filter' => 'auth']);
$routes->get('recipes/edit_recipe/(:num)', 'Recipes::edit_recipe/$1', ['filter' => 'auth']);
$routes->post('recipes/update/(:num)', 'Recipes::update/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'recipes/add_directions/(:num)', 'Recipes::add_directions/$1', ['filter' => 'auth']);

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
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
