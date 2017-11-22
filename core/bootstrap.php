<?php 

if (!defined ( 'ZAPERTO' ))
{
	exit ( "No such file" );
}

include 'App.php';
include 'database/QueryBuilder.php';
include 'database/Connection.php';

use App\Core\App;
App::bind('config', require 'config.php');
session_start();
$QB = new QueryBuilder(Connection::make(App::get('config')['database']));
App::bind('database', $QB);
session_write_close();

function getQB()
{      
    global $QB;
    return $QB;
}

function view($name, $data = [])
{
    extract($data);
    return require "app/views/{$name}.view.php";
}

function redirect($to)
{
    header("Location: /{$to}");
}