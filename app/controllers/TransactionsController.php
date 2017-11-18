<?php

namespace App\Controllers;

use App\Core\App;
use App\Models\Transaction;
use App\Models\Amount;

class TransactionsController{    

    public function store($amount)
    {
        sleep(2);
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
        sleep(2);
        $amount = new Amount($_POST['amount']);        
        if(is_numeric($amount->getAmount()) && strlen($amount->getAmount()) != 0)
        {
            $currrent_bal = App::get('database')->selectBalance('transaction');
            $balance = Abs($currrent_bal->balance) - Abs($amount->getAmount());    
            if($balance >= 0)
            {
                App::get('database')->updateWriteOff('transaction', $balance);        
                $this->store(Abs($amount->getAmount()));                            
            }           
        }
        return redirect('');
    }
}