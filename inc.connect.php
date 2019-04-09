<?php

    define('DB_SERVIDOR' , 'localhost');
    define('DB_USUARIO' , 'root');
    define('DB_SENHA' , '');
    define('DB_BANCO' , 'loja2');

    $link = mysql_connect(DB_SERVIDOR, DB_USUARIO, DB_SENHA) or die('Não foi possivel conectar ao servidor!');
    mysql_select_db('loja2', $link) or die('Erro ao conectar ao banco de dados!');





?>