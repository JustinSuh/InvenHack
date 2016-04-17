<?php

header('Access-Control-Allow-Origin: *');  

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

        'user' => [
            'username' => 'root',
            'password' => '',
            'host' => 'localhost',
            'dbname' => 'inventory',
            'db' => 'mysql',
        ],
    ],
];