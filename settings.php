<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
        ],

        'dbConn' => [
            'username' => 'guest',
            'password' => '',
            'host' => 'localhost',
            'dbname' => 'apiary',
            'db' => 'mysql',
        ],

        'testImage' => [
            'username' => 'guest',
            'password' => '',
            'host' => 'localhost',
            'dbname' => 'MMTest',
            'db' => 'mysql',
        ],

        'login_dbConn' => [ 
            'username' => 'basic_user', 
            'password' => 'abc123', 
            'host' => 'localhost', 
            'dbname' => 'test_auth', 
            'db' => 'mysql', 
        ],

        'user' => [
            'username' => 'root',
            'password' => '',
            'host' => 'localhost',
            'dbname' => 'inventory',
            'db' => 'mysql',
        ],

//***********************************************************************************

        'api_login' => [ 
            'username' => 'api_test',         
            'password' => 'qwe123',              
            'host' => 'localhost',              
            'dbname' => 'pocketgains',          
            'db' => 'mysql', 
        ],
    ],
];
