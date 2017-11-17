<?php

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAllTransaction($table)
    {  
        $sql = sprintf(
            'SELECT * FROM %s WHERE id_user = %s ORDER BY date_oper DESC',
            $table,
            $_SESSION['userData'][0]->id            
        );
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

     public function selectBalance($table)
    {        
        $sql = sprintf(
            'SELECT balance FROM %s WHERE id_user = %s',
            $table,
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

    public function insertIntoDatabase($table, $parameters)
    {
        if(!empty($parameters))
        {
            $sql = sprintf('insert into %s (%s) values (%s)',
                            $table,
                            implode(', ', array_keys($parameters)),
                            ':' . implode(', :', array_keys($parameters))    
                          );
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        }        
    }

    public function updateWriteOff($table, $amount)
    {        
        if(strlen($amount) != 0 && !empty($table))
        {
            $sql = sprintf('update %s set balance = %s where id_user = %s',
                            $table,
                            $amount,
                            $_SESSION['userData'][0]->id    
                          );
            $statement = $this->pdo->prepare($sql);
            $statement->execute();            
        }        
    }
}