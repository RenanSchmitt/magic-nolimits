<?php
    require_once('inc.connect.php');
    print_r($_POST);

    (isset($_POST['nome']) and !empty($_POST['nome'])) ? $nome = $_POST['nome'] : $erro = true;

    (isset($_POST['ende']) and !empty($_POST['ende'])) ? $ende = $_POST['ende'] : $erro = true;

    (isset($_REQUEST['acao']) and !empty($_REQUEST['acao'])) ? $acao = $_REQUEST['acao'] : $erro = true;

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
            (isset($_GET['id_fornecedor']) and !empty($_GET['id_fornecedor'])) ? $id_fornecedor = $_GET['id_fornecedor'] : $erro = true;

            $query = 'DELETE FROM fornecedor 
            WHERE id_fornecedor = '.$id_fornecedor;  
            
            mysql_query($query, $link) or die(mysql_error());
            mysql_close();
            header("Location: index.php?pg=fornecedores&msg=true");
            exit; 
        break;
        

    }


?>