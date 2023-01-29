<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
// $routes->setDefaultController('Personal');
$routes->setDefaultMethod('index');
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

# LANDING PAGE
$routes->get('/', 'User::index');

//---------------- PERSONAL CONTROLLER ROUTING ----------------//
$routes->get('/personal', 'Personal::index');
$routes->get('/signup', 'Personal::signup');
$routes->get('/logout', 'Personal::logout');
$routes->get('/signin', 'Personal::signin');
$routes->get('/verification', 'Personal::verification');
# POST METHOD ROUTING #
// $routes->post('/save', 'Personal::save');
$routes->post('/save', 'Personal::register');
$routes->post('/verify', 'Personal::verify');
$routes->post('/login', 'Personal::login');


//------------- ADMINISTRATION CONTROLLER ROUTING -------------//

# ADMIN DEFAULT
$routes->get('admin/default_admin', 'Administration::restore_default_admin');

// Admin Registration and Login
$routes->get('/administration', 'Administration::index');
$routes->get('/admin', 'Administration::signin');
$routes->get('/admin-signup', 'Administration::signup');
$routes->get('/admin-signin', 'Administration::signin');
// $routes->get('/', 'Home::index');
$routes->get('admin/logout', 'Administration::logout');
# POST METHOD ROUTING #
$routes->post('/login_account', 'Administration::login');


//----------------- ADMIN CONTROLLER ROUTING -----------------//
$routes->get('admin-dashboard', 'Admin::dashboard');
$routes->get('/admin/product', 'Admin::product');
$routes->get('/admin/statistics', 'Admin::statistics');
$routes->get('/forgotpassword', 'Admin::forgotpassword');
$routes->get('/admin/orders', 'Admin::orders');
$routes->post('/order/update_order/(:any)', 'Admin::order_update/$1/$2');


//---------------- PRODUCT CONTROLLER ROUTING ----------------//
$routes->post('/admin/add_product', 'Product::add_product');

$routes->get('/admin/category/birthday', 'Product::getBDay');
$routes->get('/admin/category/christening', 'Product::getChristening');
$routes->get('/admin/category/wedding', 'Product::getWedding');
$routes->get('/admin/category/graduation', 'Product::getGrad');
$routes->get('/admin/category/valentine', 'Product::getValentine');
$routes->get('/admin/category/halloween', 'Product::getHalloween');
$routes->get('/admin/category/christmas', 'Product::getChristmas');
$routes->get('/admin/category/newyear', 'Product::getNewYear');
$routes->get('/admin/category/new year', 'Product::getNewYear');
$routes->get('/admin/category/delete_prod/(:any)', 'Product::prod_delete/$1/$2');
$routes->post('/admin/category/update_prod/(:any)', 'Product::prod_update/$1/$2');


//-------------- CUSTOMIZATION CONTROLLER ROUTING --------------//
$routes->post('/admin/customization/update_addons/(:any)', 'CustomizationController::addons_update/$1/$2');
$routes->get('/admin/customization/delete_addons/(:any)', 'CustomizationController::addons_delete/$1/$2');
$routes->post('/admin/customization/add_addons', 'CustomizationController::add_addons');
$routes->get('/admin/customization/add_ons', 'CustomizationController::add_ons');
$routes->post('/admin/customization/add_ons', 'CustomizationController::add_ons');

$routes->post('/admin/customization/update_flavor/(:any)', 'CustomizationController::flavor_update/$1/$2');
$routes->get('/admin/customization/delete_flavor/(:any)', 'CustomizationController::flavor_delete/$1/$2');
$routes->post('/admin/customization/add_flavor', 'CustomizationController::add_flavor');
$routes->get('/admin/customization/flavor', 'CustomizationController::flavor');
$routes->post('/admin/customization/flavor', 'CustomizationController::flavor');

//------------------ USER CONTROLLER ROUTING ------------------//
$routes->get('/home', 'User::index');
$routes->get('/userforgotpassword', 'User::userforgotpassword');
$routes->get('/about', 'User::about');
$routes->get('/contact', 'User::contact');
$routes->get('/customization', 'User::customization');
$routes->get('/cart', 'User::cart');
$routes->get('/orderdetails', 'User::orderdetails');
$routes->get('/completedorder', 'User::completedOrder');
$routes->get('/cancelledorder', 'User::cancelledOrder');
$routes->post('/orderdetails', 'User::orderdetails');
$routes->get('/orders', 'User::userOrders');
$routes->post('/cancel_order/(:any)', 'User::cancel_order/$1/$2');
$routes->post('/order_received/(:any)', 'User::order_received/$1/$2');
$routes->get('/checkout', 'User::checkout');
$routes->get('/productlist', 'User::productlist');
$routes->get('/productgrid', 'User::productgrid');
$routes->get('/faq', 'User::faq');
$routes->get('/modal', 'User::modal');
$routes->get('/popular', 'User::popular');

$routes->post('/productdetails', 'User::productdetails');

$routes->get('/birthday', 'User::getBDay');
$routes->get('/christening', 'User::getChristening');
$routes->get('/christmas', 'User::getChristmas');
$routes->get('/halloween', 'User::getHalloween');
$routes->get('/valentine', 'User::getValentine');
$routes->get('/graduation', 'User::getGrad');
$routes->get('/newyear', 'User::getNewYear');
$routes->get('/wedding', 'User::getWedding');
$routes->get('/get_shape', 'User::get_shape');

$routes->post('/save_design', 'User::saveFinalDesign');
$routes->get('/custom_design', 'User::getCustomDesign');


//-------------------- CART CONTROLLER ROUTING ---------------------//
#add cart #
$routes->post('/add_cart', 'CartController::add_cart');
$routes->get('cart/delete_cart/(:any)', 'CartController::CartData_delete/$1/$2');


//------------------ CHECKOUT CONTROLLER ROUTING ------------------//
# PLACE ORDER #
$routes->post('/placeorder','CheckoutController::placeorder');





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
