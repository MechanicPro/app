<?php

namespace App\Controllers;

use App\Core\App;

class AuthController
{
    public function login()
    {
        $userData = App::get('database')->selectUserFromDB($_GET['login'] ,  $_GET['pswd']);
        if(!empty($userData)){
            $userData['success'] = true;
            session_start();
            $_SESSION['userData'] = $userData;
            session_write_close();
            return redirect('');
        }
    }    

    public function logout()
    {
        session_start();
        $_SESSION['userData']['success'] = false;
        session_unset();
        redirect('');
    }
}