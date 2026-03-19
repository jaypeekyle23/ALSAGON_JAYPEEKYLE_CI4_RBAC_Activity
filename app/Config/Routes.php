<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');
$routes->get('login', 'Auth::index');
$routes->post('login', 'Auth::index');
$routes->get('logout', 'Auth::logout');
$routes->get('blocked', 'Home::unauthorized');
$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::registration');

// The single, correct route for our new custom error page:
$routes->get('unauthorized', 'Home::unauthorized');

// Intercept fake student admin URLs and show Access Denied
$routes->get('student/users', 'Home::unauthorized');
$routes->get('student/menu-management', 'Home::unauthorized');

// Activity Routes (Public/No Role restriction)
$routes->get('about', 'PageController::about');
$routes->get('contact', 'PageController::contact');
$routes->get('menu','Menu::index');

// Starter Panel Settings Routes (Untouched)
$routes->group('users', static function ($routes) {
    $routes->get('/', 'Settings::users');
    $routes->post('create-role', 'Settings::createRole');
    $routes->post('update-role', 'Settings::updateRole');
    $routes->delete('delete-role/(:num)', 'Settings::deleteRole/$1');

    $routes->get('role-access', 'Settings::roleAccess');
    $routes->post('create-user', 'Settings::createUser');
    $routes->post('update-user', 'Settings::updateUser');
    $routes->delete('delete-user/(:num)', 'Settings::deleteUser/$1');

    $routes->post('change-menu-permission', 'Settings::changeMenuPermission');
    $routes->post('change-menu-category-permission', 'Settings::changeMenuCategoryPermission');
    $routes->post('change-submenu-permission', 'Settings::changeSubMenuPermission');
});

$routes->group('menu-management', static function ($routes) {
    $routes->get('/', 'Settings::menuManagement');
    $routes->post('create-menu-category', 'Settings::createMenuCategory');
    $routes->post('create-menu', 'Settings::createMenu');
    $routes->post('create-submenu', 'Settings::createSubMenu');
});

// ==========================================
// === NEW ACTIVITY RBAC FILTERED ROUTES ====
// ==========================================

// 1. ALL LOGGED IN USERS (Student, Teacher, Admin)
$routes->group('', ['filter' => ['auth']], static function ($routes) {
    $routes->get('profile', 'ProfileController::show');
    $routes->get('profile/edit', 'ProfileController::edit');
    $routes->post('profile/update', 'ProfileController::update');
});

// 2. STUDENT ONLY
$routes->group('', ['filter' => ['auth', 'student']], static function ($routes) {
    $routes->get('student/dashboard', 'StudentController::dashboard');
});

// 3. TEACHER & ADMIN ONLY
$routes->group('', ['filter' => ['auth', 'teacher']], static function ($routes) {
    $routes->get('dashboard', 'Home::index'); 
    
    // Existing Student CRUD routes moved here to protect them
    $routes->get('students', 'StudentInfo::index');
    $routes->post('student/store', 'StudentInfo::store');
    $routes->delete('student/delete/(:num)', 'StudentInfo::delete/$1');
    $routes->get('student/edit/(:num)', 'StudentInfo::edit/$1');
    $routes->post('student/update/(:num)', 'StudentInfo::update/$1');
    $routes->get('students/show/(:num)', 'StudentInfo::show/$1'); // Added for Matrix
});

// 4. ADMIN ONLY (As required by Matrix)
$routes->group('admin', ['filter' => ['auth', 'admin']], static function ($routes) {
    $routes->get('roles', 'Admin\RoleController::index');
    $routes->get('roles/create', 'Admin\RoleController::create');
    $routes->post('roles/store', 'Admin\RoleController::store');
    $routes->get('roles/edit/(:num)', 'Admin\RoleController::edit/$1');
    $routes->post('roles/update/(:num)', 'Admin\RoleController::update/$1');
    $routes->get('roles/delete/(:num)', 'Admin\RoleController::delete/$1');

    $routes->get('users', 'Admin\UserAdminController::index');
    $routes->post('users/assign-role/(:num)', 'Admin\UserAdminController::assignRole/$1');
});