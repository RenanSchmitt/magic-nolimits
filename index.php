<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Magic NO LIMITS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body style="text-align: center;">
    
    <nav class="navbar is-warning" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="index.php?pg=home">
        <img src="./images/logo.png" width="112" height="28">
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
        <a class="navbar-item" href="index.php?pg=home" >
            Home
        </a>

        <a class="navbar-item" href="index.php?pg=produtos">
            Produtos
        </a>

        <a class="navbar-item" href="index.php?pg=registro">
            Registro
        </a>

        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
            More
            </a>

            <div class="navbar-dropdown">
            <a class="navbar-item">
                Sobre nós
            </a>
            <a class="navbar-item">
                Como participar
            </a>
            <a class="navbar-item">
                Contato
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item">
                Reportar um Bug
            </a>
            </div>
        </div>
        </div>

        <div class="navbar-end">
        <div class="navbar-item">
            <div class="buttons">
            <a class="button is-primary">
                <strong>Sign up</strong>
            </a>
            <a class="button is-light">
                Log in
            </a>
            </div>
        </div>
        </div>
    </div>
    </nav>
</body>

<?php

    // require_once('inc.connect.php');
    // echo $link;
    if( isset($_GET['pg']) and !empty($_GET['pg'])){
        $pag= $_GET['pg'];
     
    } else {
        $pag = 'home';
    }
    include_once ('inc.'.$pag.'.php');

?>
</html>

<?php

// mysql_close();
?>