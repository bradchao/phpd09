<?php
    include('bradapis.php');

    $sql = 'SELECT * FROM gift';
    $stmt = $pdo->query($sql);
    $gifts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($gifts);

    foreach($gifts as $gift){
        echo "{$gift['name']}<br />";
    }


?>