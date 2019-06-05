<?php

session_start();
$user = $_POST['user'];
$pass = $_POST['pass'];

if($user == 'admin' && $pass == '123'){
    $_SESSION['login']['user'] = $user;
    $_SESSION['login']['pass'] = $pass;
    $_SESSION['login']['dthora'] = date("Y-m-d H:i:s"); 
    
    header('Location: index.php?pg=home&login=true');
    exit;
} else {
    header('Location: index.php?pg=login&msg=true');
    exit;
}
?>