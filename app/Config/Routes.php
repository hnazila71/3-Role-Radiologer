<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Authentication routes
$routes->group('', function ($routes) {
    $routes->get('/login', 'Login::index');
    $routes->post('/login/authenticate', 'Login::authenticate');
    $routes->get('/logout', 'Login::logout');
});

// Registration routes
$routes->group('', function ($routes) {
    $routes->get('/register', 'Register::index');
    $routes->post('/register/save', 'Register::save');
});

// Dashboard route (accessible to all roles)
$routes->get('/dashboard', 'Dashboard::index');

// Radiologer routes (accessible only to 'radiologer' role)
$routes->group('', ['filter' => 'role:radiologer'], function ($routes) {
    $routes->get('/radiologer', 'ImageController::index'); // Radiologer dashboard
    $routes->post('/radiologer/addPatientToImages', 'ImageController::addPatientToImages'); // Add patient to images
    $routes->post('/radiologer/addPatient', 'ImageController::savePatient'); // Save new patient
    $routes->get('/radiologer/uploadForm/(:num)', 'ImageController::uploadForm/$1'); // Upload image form
    $routes->post('/radiologer/uploadImage', 'ImageController::uploadImage'); // Save uploaded image
});

// Admin-specific routes (accessible only to 'admin' role)
$routes->group('', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('/admin/dashboard', 'AdminDashboard::index'); // Admin dashboard
});

// Patient management routes (accessible to all roles that need to manage patients)
$routes->group('', function ($routes) {
    $routes->get('/patient/create', 'PatientController::create'); // Create new patient form
    $routes->post('/patient/save', 'PatientController::save'); // Save new patient
    $routes->post('/patient/delete', 'PatientController::delete'); // Delete patient
});

// Doctor routes
$routes->get('/doctor-dashboard', 'DoctorDashboardController::index'); // Doctor dashboard

// Image routes
$routes->get('/images', 'ImageController::index'); // List of images
