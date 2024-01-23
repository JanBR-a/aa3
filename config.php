<?php
    // Carga las variables de entorno del archivo .env
   /* $env = parse_ini_file(__DIR__ . '/.env');

    return [
        'dbuser' => $env['DB_USER'],
        'dbpassword' => $env['DB_PASSWORD'],
        'connection' => $env['DB_DRIVER'].':host='.$env['DB_HOST'],
        'dbname' => $env['DB_NAME'],
        'options' => [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING
        ]
    ];
*/

$config = [
    'dbuser' => 'library',
    'dbpassword' => 'linuxlinux',
    'connection' => 'mysql:host=localhost',
    'dbname' => 'aa3',
    'options' => [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING
    ]
];


return $config;

