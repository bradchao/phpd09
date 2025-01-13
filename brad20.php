<?php
    $id = 'C123456789';
    $regex = '/^[A-Z][12][0-9]{8}$/';
    if (preg_match($regex, $id)){
        echo 'OK';
    }else{
        echo 'XX';
    }



?>