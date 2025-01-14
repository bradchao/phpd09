<?php
    $mysqli = new mysqli('localhost','root','','brad');
    $mysqli->set_charset('utf8');
    $sql = 'INSERT INTO cust (account,passwd,realname)' . 
            ' VALUES ("brad","123456","Brad")';
    $mysqli->query($sql);
?>