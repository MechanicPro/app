<?php

namespace App\Controllers;

use App\Core\App;
use App\Models\Transaction;
use App\Models\Balance;

class TransactionsController{    

    public function store($amount)
    {
        $trans = new Transaction($_SESSION['userData'][0]->id,
                                 (-1 * $amount),
                                 date("Y-m-d H:i:s")
                                );
        

        App::get('database')->insertIntoDatabase('transactionlog', 
                                                ['id_user' => $trans->getIdUser(),
                                                 'sum_oper' => $trans->getSumOper(), 
                                                 'date_oper' => $trans->getDateOper()]);			
        return redirect('');
    }   

    public function writeOff()
    {          
        $amount = new Balance($_POST['amount']);        
        if(is_numeric($amount->getBalans()) && strlen($amount->getBalans()) != 0)
        {
            $currrent_bal = App::get('database')->selectBalance('transaction');
            $balance = Abs($currrent_bal->balance) - Abs($amount->getBalans());           
            if($balance >= 0)
            {
                App::get('database')->updateWriteOff('transaction', $balance);        
                $this->store(Abs($amount->getBalans()));                  
                return redirect('');           
            }
            else
            {                            
                return redirect('');
            }
        }  
        else
        {            
            return redirect('');    
        }
    }
}

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