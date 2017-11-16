<?php require('app/views/header.php'); ?>
<div class="container">
    <label for="balance" >Balance:</label>
    <b><?=$operation['balance']->balance?></b>
    <div class="col-lg-5 col-md-6">       
        <form method="POST" action="trans/writeOff" class="form-group row">
            <div> 
                <label for="amount" >Amount charged: </label>                
                <input type="text" name="amount" class="amount">       
                <button class="btn btn-primary" type="submit">accept</button>
            </div>           
        </form>
    </div>      
<h1>All transactions:</h1>
<div class="row"> 
    <?php if (isset($operation['transactions'])) : ?>
    <table class="table">
        <thead>
            <tr>
                <th>NUMBER</th> 
                <th>AMOUNT</th>  
                <th>DATE</th> 
            </tr>
        </thead>
    <?php foreach ($operation['transactions'] as $trans) :?>           
        <tbody>
            <tr class="info">
                <td><?=$trans->id?></td>       
                <td><?=$trans->sum_oper?></td>
                <td><?=$trans->date_oper?></td>
            </tr>    	
    <?php endforeach;?>
        </tbody>                            
    </table>
    <?php endif; ?>        
</div> 
<hr>
</div>