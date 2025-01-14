<?php
    $rows = file('dir1/ns1hosp.csv');
    foreach($rows as $k => $v){
        echo "{$k}:{$v}<br />";
    }
    echo "<hr />";
    $content = file_get_contents('dir1/ns1hosp.csv');
    echo $content;
?>