<?php
    include('bradapis.php');
    session_start();
    if (!isset($_SESSION['member'])) header('Location: brad52.php');
    $member = $_SESSION['member'];

    if (isset($_POST['realname'])){
        $passwd = $_POST['passwd'];
        $realname = $_POST['realname'];
        $icon = $_FILES['icon'];

        $mysqli = new mysqli('localhost','root','', 'brad');
        $mysqli->set_charset('utf8');

        if ($icon['error'] == 0){
            $iconData = file_get_contents($icon['tmp_name']);
            $iconType = $icon['type'];
            $sql = 'UPDATE cust SET passwd = ?, realname = ?, icon = ?, icontype = ?' .
                ' WHERE id = ?';
            $stmt = $mysqli->prepare($sql);
            $id = $member->getId();
            $stmt->bind_param('ssssi', $passwd, $realname, $iconData, $iconType, $id);
        }else{
            $sql = 'UPDATE cust SET passwd = ?, $realname = ? WHERE id = ?';
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param('ssi', $passwd, $realname, $member->getId());
        }  
        
        if ($stmt->execute()){
            
            header('Location: brad48.php');
        }else{
            echo "ERROR: {$mysqli->error}";
        }        

    }    


?>
<form action="brad56.php" method="post" 
    enctype="multipart/form-data">
    Password: <input type="password" name="passwd" /><br />
    Realname: <input name="realname" value='<?php echo $member->getRealname(); ?>' /><br />
    Icon: <input type="file" name="icon" /><br />
    <input type="submit" value="Update" />
</form>