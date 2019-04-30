<?php
    require_once('inc.connect.php');
   

    (isset($_POST['nome']) and !empty($_POST['nome'])) ? $nome = $_POST['nome'] : $erro = true;

    (isset($_POST['valor']) and !empty($_POST['valor'])) ? $valor = $_POST['valor'] : $erro = true;

    (isset($_POST['fornecedor']) and !empty($_POST['fornecedor'])) ? $fornecedor = $_POST['fornecedor'] : $erro = true;

    (isset($_POST['filial']) and !empty($_POST['filial'])) ? $filial = $_POST['filial'] : $erro = true;

    (isset($_REQUEST['acao']) and !empty($_REQUEST['acao'])) ? $acao = $_REQUEST['acao'] : $erro = true;

    switch ($acao) {
        case 'insert':
            echo 'inserir registro';
            
            $query = 'INSERT INTO produto (
                nome,
                valor,
                id_fornecedor,
                id_filial)

                VALUES("'.$nome.'",
                "'.$valor.'",
                "'.$fornecedor.'",
                "'.$filial.'")';

            echo $query;
            mysql_query($query, $link) or die(mysql_error());
            mysql_close();
            header("Location: index.php?pg=cadastroprod&msg=true");
            exit;  
           
        
        break;
        case 'update':
            echo 'update';
            
        break;
        case 'delete':
            echo 'delete';
            (isset($_GET['id_produto']) and !empty($_GET['id_produto'])) ? $id_contato = $_GET['id_produto'] : $erro = true;

            $query = 'DELETE FROM produto 
            WHERE id_produto = '.$id_contato;  
            
            mysql_query($query, $link) or die(mysql_error());
            mysql_close();
            header("Location: index.php?pg=produtos&msg=true");
            exit; 
            
        break;
        
  
    }

?>