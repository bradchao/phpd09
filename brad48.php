<?php
    $rpp = 10; // rows per page

    $mysqli = new mysqli('localhost','root','', 'brad');
    $mysqli->set_charset('utf8');

    $sql = 'SELECT count(*) total FROM gift';
    $result = $mysqli->query($sql);
    $row = $result->fetch_object();
    $total = $row->total;
    $pages = ceil($total / $rpp);

    $page = 1;

    if (isset($_GET['page'])) $page = $_GET['page'];
    $start = $rpp * ($page - 1);

    $prev = $page == 1? 1: $page -1;
    $next = $page == $pages? $page : $page + 1;

    $key = "";
    //$sql = 'SELECT id,name,feature,city,town FROM gift LIMIT ?, ?';
    $sql = 'SELECT id,name,feature,city,town FROM gift';
    if (isset($_GET['key']) && strlen($_GET['key'])> 0){
        $key = $_GET['key'];
        $skey = "%{$key}%";
        $sql .= ' WHERE name LIKE ? OR feature LIKE ? OR city LIKE ? OR town LIKE ?';
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('ssss', $skey,$skey,$skey,$skey);
    }else{
        $stmt = $mysqli->prepare($sql);
    }
    //$stmt->bind_param('ii', $start, $rpp);
?>
<meta charset='UTF-8'>
<h1>Brad Big Company</h1>
<hr />
<a href="?page=<?php echo $prev; ?>">Prev</a> | <a href="?page=<?php echo $next; ?>">Next</a>
<hr />
<form>
    Keyword: <input name="key" value="<?php echo $key; ?>"/>
    <input type="submit" value="Search" />
</form>
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