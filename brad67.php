<?php
    include('bradapis.php');

    try{
        $pdo->beginTransaction();
    
        $pdo->exec('INSERT INTO cust (account,passwd,realname) VALUES ("brad1","123456","Brad")');
        $pdo->exec('INSERT INTO cust (account,passwd,realname) VALUES ("brad2","123456","Brad")');
    
        $pdo->commit();
        echo 'OK';
    }catch(PDOException $e){
        $pdo->rollBack();
        echo $e->getMessage() . '<br />';
    }

    echo 'Game Over';
?>