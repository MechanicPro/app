<?php

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAllTransaction()
    {  
        $sql = sprintf('SELECT * FROM transactionlog WHERE id_user = %s ORDER BY date_oper DESC',                        
                        $_SESSION['userData'][0]->id            
                      );
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

     public function selectBalance()
    {        
        $sql = sprintf('SELECT balance FROM transaction WHERE id_user = %s',                        
                        $_SESSION['userData'][0]->id            
                      );
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }
    
    public function selectUserFromDB($login, $pswd)
    {       
        $sql = sprintf('SELECT * FROM users WHERE login = \'%s\' and pswd = \'%s\'',            
                        $login,
                        $pswd            
                      );
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function insertIntoDatabase($parameters)
    {
        if(!empty($parameters))
        {
            $sql = sprintf('insert into transactionlog (%s) values (%s)',                            
                            implode(', ', array_keys($parameters)),
                            ':' . implode(', :', array_keys($parameters))    
                          );
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        }        
    }

    public function updateWriteOff($amount)
    {        
        if(strlen($amount) != 0)
        {
            $sql = sprintf('update transaction set balance = %s where id_user = %s',                            
                            $amount,
                            $_SESSION['userData'][0]->id    
                          );
            $statement = $this->pdo->prepare($sql);
            $statement->execute();            
        }        
    }
}