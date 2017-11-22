<?php
namespace App\Models;

if (!defined ( 'ZAPERTO' ))
{
	exit ( "No such file" );
}

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