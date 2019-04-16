<?php
    require_once('inc.connect.php');
    print_r($_POST);

    (isset($_POST['nome']) and !empty($_POST['nome'])) ? $nome = $_POST['nome'] : $erro = true;

    (isset($_POST['ende']) and !empty($_POST['ende'])) ? $ende = $_POST['ende'] : $erro = true;

    (isset($_POST['acao']) and !empty($_POST['acao'])) ? $acao = $_POST['acao'] : $erro = true;

    switch ($acao) {
        case 'insert':
            echo 'inserir registro';
            
            $query = 'INSERT INTO fornecedor (
                nome,
                ende)

                VALUES("'.$nome.'",
                "'.$ende.'")';

           
            mysql_query($query, $link) or die(mysql_error());
            mysql_close();
            header("Location: index.php?pg=cadastroforn&msg=true");
            exit; 
        break;
        case 'update':
            echo 'update';
        break;
        case 'delete':
            echo 'delete';
        break;
        

    }


?>