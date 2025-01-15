<?php
    if (isset($_POST['account'])){
        $account = $_POST['account']; $passwd = $_POST['passwd']; 

        $mysqli = new mysqli('localhost','root','', 'brad');
        $mysqli->set_charset('utf8');
        $sql = 'SELECT id,account,passwd,realname,icon,icontype ' . 
                'FROM cust WHERE account = ?';
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $account);
        if ($stmt->execute()){
            //$stmt->store_result();
            if ($stmt->num_rows() > 0){
                $stmt->bind_result($id,$account,$hashPasswd,$realname,$icon,$icontype);
                $stmt->fetch();
                if (password_verify($passwd, $hashPasswd)){
                    header('Location: brad48.php');
                }else{
                    // Password ERROR
                }
            }else{
                // Account NOT EXIST
            }

        }
    

    }
?>
<meta charset="UTF-8" />
<h1>Login Page</h1>
<hr />
<form action="brad52.php" method="post" >
    Account: <input name="account" /><br />
    Password: <input type="password" name="passwd" /><br />
    <input type="submit" value="Login" />
</form>