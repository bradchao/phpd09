<?php
    session_start();
    if (!isset($_SESSION['lottery'])) header('Location: brad53.php');
    
    $lottery = $_SESSION['lottery'];
    echo $lottery;
?>
<a href='brad55.php'>Logout</a>