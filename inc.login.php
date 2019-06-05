<?php

if(isset($_GET['msg']) == true){
    echo "<script type=\"text/javascript\">alert('ERROR: Usuario ou senha incorreto.');</script>";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h4>Login: </h4>

    <form action="acao_login.php" method="post" >
    
        <label>Login: </label>
        <input type="text" id="login" name="user" size="30">
        <input type="password" id="pass" name="pass" size="30">
        <input type="submit">
    
    </form>
</body>
</html>