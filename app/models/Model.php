<?php

namespace App\Models;

class Transaction
{    
    protected $id_user;
    protected $sum_oper;
    protected $date_oper;

    public function __construct($id_user, $sum_oper, $date_oper)
    {        
        $this->id_user = $id_user;
        $this->sum_oper = $sum_oper;
        $this->date_oper = $date_oper;     
    }   

    public function getIdUser()
    {
        return $this->id_user;
    }
    
    public function getSumOper()
    {
        return $this->sum_oper;
    }

    public function getDateOper()
    {
        return $this->date_oper;
    }  
}

class Balance
{
    protected $balance;    

    public function __construct($balance)
    {
        $this->balance = $balance;       
    }

    public function getBalans()
    {
        return $this->balance;
    }    
}

class MsgError
{
    protected $MsgText;
    protected $MsgCode;

    public function __construct($MsgText, $MsgCode)
    {
        $this->MsgText = $MsgText;    
        $this->MsgCode = $MsgCode;
    }

    public function getText()
    {
        return $this->MsgText;
    } 
    
    public function getCode()
    {
        return $this->MsgCode;
    }  
}