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