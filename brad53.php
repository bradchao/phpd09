<?php
    include('bradapis.php');
    session_start();

    $lottery = rand(1,49);
    echo $lottery;
    $_SESSION['lottery'] = $lottery;
    $lottery = 100;

    $ary = [1,2,3,4];
    $_SESSION['ary'] = $ary;

    $ary[] = 5;
    $ary[0] = 100;

    $member = new Member(1,'brad','Brad',null,null);
    $_SESSION['member'] = $member;
    $member->setRealname('III');

?>
<hr />
<a href='brad54.php'>Next</a>
