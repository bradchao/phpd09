<?php
    $mysqli = new mysqli('localhost','root','', 'brad');
    $mysqli->set_charset('utf8');
    $sql = 'SELECT id,name,feature,city,town FROM gift';
    $stmt = $mysqli->prepare($sql);
?>
<meta charset='UTF-8'>
<h1>Brad Big Company</h1>
<hr />
<?php
    if ($stmt->execute()){
        $stmt->store_result();
        $stmt->bind_result($id,$name,$feature,$city,$town);
?>
<table width='100%' border='1'>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Feature</th>
        <th>City</th>
        <th>Town</th>
    </tr>
    <?php
        while ($stmt->fetch()){
            echo '<tr>';
            echo "<td>{$id}</td>";
            echo "<td>{$name}</td>";
            echo "<td>{$feature}</td>";
            echo "<td>{$city}</td>";
            echo "<td>{$town}</td>";
            echo '</tr>';
        }
    ?>
</table>
<?php
    }else{
        echo '查無資料';      
    }
?>