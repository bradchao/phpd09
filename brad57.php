<?php
/*
SELECT e.EmployeeID, e.LastName, SUM(od.UnitPrice*od.Quantity) total
FROM orders o
JOIN orderdetails od ON (o.OrderID = od.OrderID)
JOIN employees e ON (o.EmployeeID = e.EmployeeID)
GROUP BY e.EmployeeID
ORDER BY total DESC

4 Peacock 250187.4500
驗算
SELECT SUM(UnitPrice*Quantity) total
FROM orderdetails
WHERE OrderID IN (
	SELECT OrderID FROM orders
    WHERE EmployeeID = 4
)
*/
    $start = '1996-01-01';
    $end = '2000-12-31';
    if (isset($_GET['start'])){
        $start = $_GET['start'];
        $end = $_GET['end'];
    }

    $mysqli = new mysqli('localhost','root','', 'brad');
    $mysqli->set_charset('utf8');
    $sql = 'SELECT e.EmployeeID id, e.LastName lastname, SUM(od.UnitPrice*od.Quantity) total
            FROM orders o
            JOIN orderdetails od ON (o.OrderID = od.OrderID)
            JOIN employees e ON (o.EmployeeID = e.EmployeeID)
            WHERE o.OrderDate BETWEEN ? AND ?
            GROUP BY e.EmployeeID
            ORDER BY total DESC';
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ss', $start, $end);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $lastname, $total);
?>
<form action="brad57.php">
    Start: <input type="date" name="start" value='<?= $start ?>' /> ~
    End: <input type="date" name="end" value='<?= $end ?>' />
    <input type="submit" value="Change" />
</form>
<table width='100%' border="1">
    <tr>
        <th>#</th>
        <th>ID</th>
        <th>Name</th>
        <th>Total</th>
    </tr>
    <?php
        $rank = 1;
        while ($stmt->fetch()){
            echo '<tr>';
            echo "<td>{$rank}</td>";
            echo "<td>{$id}</td>";
            echo "<td>{$lastname}</td>";
            echo "<td>{$total}</td>";
            echo '</tr>';
            $rank++;
        }
    ?>
</table>





