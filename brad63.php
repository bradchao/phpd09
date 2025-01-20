<?php
    require('bradapis.php');

    $sql = 'DELETE FROM cust WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id' => 5
    ]);
    echo $stmt->rowCount();

?>