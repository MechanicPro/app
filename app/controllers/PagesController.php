<?php
namespace App\Controllers;
use App\Core\App;

class PagesController
{
    public function index()
    {        
        if (isset($_SESSION['userData'])  && $_SESSION['userData']['success']) 
        {        
            $transactions = App::get('database')->selectAllTransaction('transactionlog');
            $balance = App::get('database')->selectBalance('transaction');
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