<?php
    include('bradapis.php');

    $sql = 'SELECT * FROM gift WHERE name LIKE :key';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':key'=> '%禮盒%'
    ]);
    $gifts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($gifts);

    foreach($gifts as $gift){
        echo "{$gift['name']}<br />";
    }


?>