<?php

namespace App\Models;

class Amount
{
    protected $amount;    

    public function __construct($amount)
    {
        $this->amount = $amount;       
    }

    public function getAmount()
    {
        return $this->amount;
    }    
}