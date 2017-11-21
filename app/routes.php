<?php

$router->get('index', 'PagesController@index');
$router->get('', 'PagesController@index');
$router->get('login', 'PagesController@index');
$router->get('users/login', 'AuthController@login');
$router->get('logout', 'AuthController@logout');
$router->post('trans/writeOff', 'TransactionsController@writeOff');







