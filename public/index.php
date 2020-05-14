<?php

require __DIR__ . '/../bootstrap.php';

$dbh = getPdo();


// www.monsite.com/index.php?controller=home&action=index


$controller_file = CONTROLLER_PATH . '/' . basename($_GET['controller']) . '.php';


if (!isset($_GET['controller']) || empty($_GET['controller']) || !file_exists($controller_file)) {
	display_view('errors/404.php');
}


require_once $controller_file;

$user_defined_functions = get_defined_functions()['user'];

if (!isset($_GET['action']) || empty($_GET['action']) || !in_array($_GET['action'], $user_defined_functions)) {
	$_GET['action'] = 'index';
	$action = 'index';
} else {
	$action = $_GET['action'];
}

$action();