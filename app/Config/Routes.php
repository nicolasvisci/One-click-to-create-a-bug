<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->match(['get', 'post'], 'signup_cittadino', 'Cittadini::create');
$routes->match(['get', 'post'], 'signup_datore', 'Datori::create');
$routes->match(['get', 'post'], 'signup_medico', 'Medici::create');
$routes->match(['get', 'post'], 'signup_laboratorio', 'Laboratori::create');
$routes->match(['get', 'post'], 'dashboard', 'Login::auth');
$routes->match(['get', 'post'], 'dashboard1', 'Login::forgot_password');
$routes->match(['get', 'post'], 'update', 'Profile::update');
$routes->match(['get', 'post'], 'conferma_prenotazione', 'Prenota::conferma_prenotazione');
$routes->match(['get', 'post'], 'cambiaPassword', 'Dashboard::cambiaPassword');
$routes->get('home', 'Dashboard::home');
$routes->get('signupChoice', 'Dashboard::scegliRegistrazione');
$routes->get('login', 'Dashboard::login');
$routes->get('recuperaPassword', 'Dashboard::reimpostaPassword');
$routes->post('dashboard3', 'Login::change_password');
$routes->post('dashboard5', 'Login::forgot_password');
$routes->get('logout', 'Dashboard::logout');
$routes->get('profile', 'Dashboard::profile');
$routes->get('tipiTampone', 'Dashboard::tamponiLab');
$routes->get('guida', 'Dashboard::guida');
$routes->get('guida_loggedIn', 'Dashboard::guidaLoggedIn');
$routes->get('download', 'Dashboard::download');
$routes->get('prenota', 'Dashboard::prenota');
$routes->get('history', 'Dashboard::history');
$routes->get('calendario', 'Dashboard::calendario');
$routes->post('aggiungi_test', "Laboratori::aggiungi_test");
$routes->get('history_lab', 'History::history_lab');
$routes->get('mostra_info', 'History::mostra_info');
$routes->post('torna_indietro', 'History::torna_indietro');
$routes->post('getDate', 'History::get_date');
$routes->post('get_info', 'History::get_info');
$routes->post('annulla_prenotazione', 'History::annulla_prenotazione');
$routes->post('mostraLaboratori', 'Prenota::closest_locations');
$routes->post('getData', 'Prenota::get_data');
$routes->get('prenotazione', 'Prenota::prenotazione');
$routes->post('setBookData', 'Prenota::set_book_data');
$routes->get('conferma_prenotazione_singola', 'Prenota::conferma_prenotazione_singola');
$routes->get('conferma_prenotazione_multipla', 'Prenota::conferma_prenotazione_multipla');
$routes->post('delete', 'Profile::delete');
$routes->get('/', 'Pages::index');
$routes->get('(:any)', 'Pages::view/$1');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
