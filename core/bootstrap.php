<?php 

include 'App.php';
include 'database/QueryBuilder.php';
include 'database/Connection.php';

use App\Core\App;

App::bind('config', require 'config.php');

session_start();
App::bind('database', new QueryBuilder(Connection::make(App::get('config')['database'])));
session_write_close();

function view($name, $data = [])
{
	extract($data);
	return require "app/views/{$name}.view.php";
}

function redirect($to)
{
	header("Location: /{$to}");
}