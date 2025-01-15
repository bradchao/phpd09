<?php
    include('bradapis.php');
    session_start();

    if (!isset($_SESSION['lottery'])) header('Location: brad53.php');

    $lottery = $_SESSION['lottery'];
    echo $lottery . '<br />';

    $ary = $_SESSION['ary'];
    var_dump($ary);
    echo '<hr />';

    $member = $_SESSION['member'];
    echo $member->getRealname();

?>
<hr />
<a href='brad55.php'>Logout</a>