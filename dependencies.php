<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], Monolog\Logger::DEBUG));
    return $logger;
};

$container['dbConn'] = function ($c) {
	$settings = $c->get('settings')['dbConn'];

	$connString = $settings['db'] . ':host=' . $settings['host'];
	$connString .= ';dbname=' . $settings['dbname'] . ';charset=utf8mb4';

	$db = new PDO($connString, $settings['username'], $settings['password']);

	return $db;
};

$container['testImage'] = function ($c) {
    $settings = $c->get('settings')['testImage'];

    $connString = $settings['db'] . ':host=' . $settings['host'];
    $connString .= ';dbname=' . $settings['dbname'] . ';charset=utf8mb4';

    $db = new PDO($connString, $settings['username'], $settings['password']);

    return $db;
};

$container['login_dbConn'] = function ($c) { 
    $settings = $c->get('settings')['login_dbConn']; 

    $connString = $settings['db'] . ':host=' . $settings['host']; 
    $connString .= ';dbname=' . $settings['dbname'] . ';charset=utf8mb4'; 

    $db = new PDO($connString, $settings['username'], $settings['password']); 

    return $db; 
};

$container['user'] = function ($c) { 
    $settings = $c->get('settings')['user']; 
    $connString = $settings['db'] . ':host=' . $settings['host']; 
    $connString .= ';dbname=' . $settings['dbname'] . ';charset=utf8mb4'; 
    $db = new PDO($connString, $settings['username'], $settings['password']); 
    return $db; 
};

//***********************************************************************************

$container['api_login'] = function ($c) { 
    $settings = $c->get('settings')['api_login']; 

    $connString = $settings['db'] . ':host=' . $settings['host']; 
    $connString .= ';dbname=' . $settings['dbname'] . ';charset=utf8mb4'; 

    $db = new PDO($connString, $settings['username'], $settings['password']); 

    return $db; 
};


