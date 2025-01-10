<?php
    define("ROWS", 1);
    define("START", 1);
    define("COLS", 9);
?>
<h1>Brad Big Company</h1>
<hr />
<form action="brad99.php">
    Start: <input type="number" name="start" />
    Rows: <input type="number" name="rows" />
    Columns: <input type="number" name="cols" />
    <input type="submit" value="Change" />
</form>
<table width='100%' border='1'>
    <?php
        for ($k = 0; $k < ROWS; $k++){
            echo '<tr>';
            for ($j = START; $j < START+COLS; $j++){
                $newj = $j + $k * COLS;
                echo '<td>';
                for ($i = 1; $i<= 9; $i++){
                    $r = $newj * $i;
                    echo "{$newj} x {$i} = {$r}<br />";
                }
                echo '</td>';   
            }
            echo '</tr>';
    
        }
    ?>
</table>