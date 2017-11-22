<?php
namespace App\Core;

if (!defined ( 'ZAPERTO' ))
{
	exit ( "No such file" );
}

class Request
{	
    public static function uri()
    {
	return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    }

    public static function method()
    {
	return $_SERVER['REQUEST_METHOD'];
    }
}