<?php
    $poker = range(0,51);
    shuffle($poker);

    foreach ($poker as $card){
        echo "{$card}<br />";
    }
?>
<hr />
<?php
    $players = [[],[],[],[]];
    foreach ($poker as $i => $card){
        $players[$i%4][(int)($i/4)] = $card;
    }

    foreach($players[1] as $card){
        echo "{$card}<br />";
    }

?>