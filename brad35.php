<?php
    $fp = fopen('dir1/ns1hosp.csv', 'r');

    fgets($fp);
    while ( ($line = fgets($fp)) !== false){
        $data = explode(',', $line);
        echo "{$data[2]} : {$data[4]} : {$data[7]}<br />";
    }


    fclose($fp);

?>