<?php

namespace App\Controllers;

use App\Models\Transaction;
use App\Models\Amount;

class TransactionsController
{   
    protected $qb;
    
    public function __construct()
    {        
        $this->qb = getQB();       
    }    
    
    public function store($amount)
    {              
        $trans = new Transaction($_SESSION['userData'][0]->id,
                                (-1 * $amount),
                                date("Y-m-d H:i:s")
                                );            
        $this->qb->insertIntoDatabase(['id_user' => $trans->getIdUser(),
                                 'sum_oper' => $trans->getSumOper(), 
                                 'date_oper' => $trans->getDateOper()]);			
        return redirect('');
    }   

    public function writeOff()
    {  
        $amount = new Amount($_POST['amount']);        
        if(is_numeric($amount->getAmount()) && strlen($amount->getAmount()) != 0)
        {
            $currrent_bal = $this->qb->selectBalance();
            $balance = Abs($currrent_bal->balance) - Abs($amount->getAmount());    
            if($balance && !($balance + ABS($balance)))
            {
               return redirect('');                            
            }              
            $this->qb->updateWriteOff($balance);        
            $this->store(Abs($amount->getAmount())); 
        }
        return redirect('');
    }
}