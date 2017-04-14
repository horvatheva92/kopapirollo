<?php
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //$csatlakozas = mysql_connect('localhost','horvatheva','a');
		//mysql_select_db("kopapirollo", $csatlakozas);
        $username =$_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = mysql_query($sql) or die( "MySQL Error: ".mysql_error() );
        $user = mysql_fetch_assoc($result);
        if($user !== false) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['password'] = $user['password'];
            echo "online";
        } else {
            echo "no";
        }
    }
?>