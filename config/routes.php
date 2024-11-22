<?php
$routes = [
    ['method' => 'GET', 'path' => '/', 'handler' => 'HomeController@index'],
    ['method' => 'GET', 'path' => '/state/list', 'handler' => 'StateController@list'],
];
define('ROUTES', $routes);
