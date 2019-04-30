<?php
    require_once('inc.connect.php');
    print_r($_POST);

    (isset($_POST['id_produto']) and !empty($_POST['id_produto'])) ? $id_produto = $_POST['id_produto'] : $erro = true;

    (isset($_POST['qtd']) and !empty($_POST['qtd'])) ? $qtd = $_POST['qtd'] : $erro = true;

    (isset($_POST['valor']) and !empty($_POST['valor'])) ? $valor = $_POST['valor'] : $erro = true;

    (isset($_POST['filial']) and !empty($_POST['filial'])) ? $filial = $_POST['filial'] : $erro = true;

    (isset($_REQUEST['acao']) and !empty($_REQUEST['acao'])) ? $acao = $_REQUEST['acao'] : $erro = true;

    switch ($acao) {
        case 'insert':
            echo 'inserir registro';
            
            $query = 'INSERT INTO venda_itens (
                id_produto,
                qtd,
                valor)

                VALUES("'.$id_produto.'",
                "'.$qtd.'",
                "'.$valor.'")';

            
            mysql_query($query, $link) or die(mysql_error());
            mysql_close();
            header("Location: index.php?pg=cadastrovenda&msg=true");
            exit;  
           
        
        break;
        case 'update':
            echo 'update';
        break;
        case 'delete':
            echo 'delete';
            (isset($_GET['id_venda_itens']) and !empty($_GET['id_venda_itens'])) ? $id_venda_itens = $_GET['id_venda_itens'] : $erro = true;

            $query = 'DELETE FROM venda_itens 
            WHERE id_venda_itens = '.$id_venda_itens;  
            
            mysql_query($query, $link) or die(mysql_error());
            mysql_close();
            header("Location: index.php?pg=vendas&msg=true");
            exit; 
        break;
        
  
    }

?>