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


$routes->get('/', 'Home::index');
$routes->post('/addnewproject', 'Projects::addnewproject');
$routes->get('getprojects', 'Projects::getprojects');

$routes->get('/afficherzone', 'Zone::afficherzone');
$routes->get('/afficherzonebyid/(:any)', 'Zone::afficherzonebyid/$1');

$routes->get('/getitem', 'Todolist::getitem');
$routes->post('/addtodo', 'Todolist::additem');
$routes->put('/updateitem', 'Todolist::updateitem');
$routes->delete('/deleteitem/(:num)', 'Todolist::deleteitem/$1');

$routes->get('/getcomment', 'Comment::getcomment');
$routes->post('/addcomment', 'Comment::addcomment');
$routes->put('/updatecomment', 'Comment::updatecomment');
$routes->delete('/deletecomment/(:num)', 'Comment::deletecomment/$1');

$routes->get('/getlink', 'Link::getlink');
$routes->post('/addlink', 'Link::addlink');
$routes->put('/updatelink', 'Link::updatelink');
$routes->delete('/deletelink/(:num)', 'Link::deletelink/$1');



$routes->put('/updateprio', 'Projects::updateprio');
$routes->put('/updatestatus', 'Projects::updatestatus');

$routes->post('/addprestation', 'Price::addprestation');
$routes->get('/gettypeprestations', 'Price::gettypeprestations');

$routes->post('/addpriceitem', 'Item::addpriceitem');
$routes->get('/getpriceitem', 'Item::getpriceitem');

$routes->post('/adddescription', 'Description::adddescription');
$routes->get('/getdescription', 'Description::getdescription');

$routes->post('/addunity', 'Unity::addunity');
$routes->get('/getunity', 'Unity::getunity');

$routes->post('/addunitprice', 'Unitprice::addunitprice');
$routes->get('/getunitprice', 'Unitprice::getunitprice');


// Missions
$routes->post('/addnewmission', 'Missions::addnewmission');
$routes->get('getmissions', 'Missions::getmissions');

$routes->put('/updatepriomission', 'Missions::updatepriomission');
$routes->put('/updatestatusmission', 'Missions::updatestatusmission');

// log
$routes->post('/logme', 'Log::logme');
// $routes->get('/logme', 'Log::logme');


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
