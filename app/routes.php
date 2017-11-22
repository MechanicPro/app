<?php

$router->get('index', 'PagesController@index');
$router->get('', 'PagesController@index');
$router->get('login', 'PagesController@index');
$router->get('logout', 'AuthController@logout');
$router->post('users/login', 'AuthController@login');
$router->post('trans/writeOff', 'TransactionsController@writeOff');







