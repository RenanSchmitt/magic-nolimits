<?php
    if(isset($_SESSION) and empty($_SESSION)) {
        header('Location: index.php?pg=home');
        exit;
    }
?>