<?php
namespace App\Controllers;

if (!defined ( 'ZAPERTO' ))
{
	exit ( "No such file" );
}
class AuthController
{
    protected $qb;
    
    public function __construct()
    {        
        $this->qb = getQB();       
    }  
    public function login()
    {
        $input_log = $this->verificationTEXT($_POST['login']);
        $input_pas = $this->verificationTEXT($_POST['pswd']);
        $userData = $this->qb->selectUserFromDB($input_log, $input_pas);
        if(!empty($userData)){
            $userData['success'] = true;
            session_start();
            $_SESSION['userData'] = $userData;
            session_write_close();            
            return redirect('');
        }
    }

    public function verificationTEXT($text)
    {
       $input_text = strip_tags($text);
       $input_text = htmlspecialchars($input_text);
       $input_text = mysql_escape_string($input_text);
       return  $input_text;
    }

    public function logout()
    {
        session_start();
        $_SESSION['userData']['success'] = false;
        session_unset();
        redirect('');
    }
}