<?php
namespace App\Controllers;

class PagesController
{
    protected $qb;
    
    public function __construct()
    {        
        $this->qb = getQB();       
    }  
    
    public function index()
    {         
        if (isset($_SESSION['userData'])  && $_SESSION['userData']['success']) 
        {        
            $transactions = $this->qb->selectAllTransaction();
            $balance = $this->qb->selectBalance();
            $operation = ["transactions" => $transactions,
                          "balance" => $balance,
                         ];
            return view('body/body', compact('operation'));
        }          
        else
        {
            return view('auth/login');  
        }	
    }
}