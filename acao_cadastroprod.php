<?php
    require_once('inc.connect.php');
    print_r($_POST);

    (isset($_POST['nome']) and !empty($_POST['nome'])) ? $nome = $_POST['nome'] : $erro = true;

    (isset($_POST['valor']) and !empty($_POST['valor'])) ? $valor = $_POST['valor'] : $erro = true;

    (isset($_POST['acao']) and !empty($_POST['acao'])) ? $acao = $_POST['acao'] : $erro = true;

    switch ($acao) {
        case 'insert':
            echo 'inserir registro';
            
            $query = 'INSERT INTO produto (
                nome,
                valor)

                VALUES("'.$nome.'",
                "'.$valor.'")';

            echo $query;
            mysql_query($query, $link) or die(mysql_error());
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php?pg=home'>";
           
        
        break;
        case 'update':
            echo 'update';
        break;
        case 'delete':
            echo 'delete';
        break;

    }


?>