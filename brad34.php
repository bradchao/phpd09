<?php
    $fp = fopen('dir1/file1.txt', 'a');
    fwrite($fp, 'Hello, Brad');
    fclose($fp);

?>