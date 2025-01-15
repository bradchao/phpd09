<?php
    session_start();

    $lottery = rand(1,49);
    echo $lottery;
    $_SESSION['lottery'] = $lottery;
?>
<hr />
<a href='brad54.php'>Next</a>
