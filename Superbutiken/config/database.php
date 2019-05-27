<?php
return [
  'default' => 'mysql',
  'migrations' => 'migrations',
  'connections' => [
    'mysql' => [
      'driver' => 'mysql',
      'host' => env('DB_HOST'),
      //"unix_socket" => '/Appli'
      'database' => env('DB_DATABASE'),
      'username' => env('DB_USERNAME'),
      'password' => env('DB_PASSWORD'),
      'charset' => 'utf8',
      'collation' => 'utf8_unicode_ci',
    ]
  ]
];
