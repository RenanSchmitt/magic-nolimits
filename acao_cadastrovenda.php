<?php
    require_once('inc.connect.php');
    require_once('inc.funcao.php');    

    (isset($_POST['id_produto']) and !empty($_POST['id_produto'])) ? $form['id_produto'] = $_POST['id_produto'] : $erro = true;

    (isset($_POST['qtd']) and !empty($_POST['qtd'])) ? $form['qtd'] = $_POST['qtd'] : $erro = true;

    (isset($_POST['valor']) and !empty($_POST['valor'])) ? $form['valor'] = $_POST['valor'] : $erro = true;

    (isset($_POST['filial']) and !empty($_POST['filial'])) ? $form['filial'] = $_POST['filial'] : $erro = true;

    (isset($_REQUEST['acao']) and !empty($_REQUEST['acao'])) ? $acao = $_REQUEST['acao'] : $erro = true;

    (isset($_POST['id_v']) and !empty($_POST['id_v'])) ? $id_v = $_POST['id_v'] : $erro = true;

    switch ($acao) {
        case 'insert':
            
            insertVenda($form, $link);
            header("Location: index.php?pg=cadastrovenda&msg=true");
            exit;
        break;
        case 'update':
        $query = 'UPDATE venda_itens SET id_produto = "'.$form['id_produto'].'", qtd = "'.$form['qtd'].'", valor = "'.$form['valor'].'" WHERE id_venda_itens = '.$id_v;

        echo $query;
        mysql_query($query, $link) or die(mysql_error());
        mysql_close();
        header("Location: index.php?pg=vendas&msg=true&action=update&action=update");
        exit;  
       
        break;
        case 'delete':
            echo 'delete';
            (isset($_GET['id_venda_itens']) and !empty($_GET['id_venda_itens'])) ? $id_venda_itens = $_GET['id_venda_itens'] : $erro = true;

            $query = 'DELETE FROM venda_itens 
            WHERE id_venda_itens = '.$id_venda_itens;  
            
            mysql_query($query, $link) or die(mysql_error());
            mysql_close();
            header("Location: index.php?pg=vendas&msg=true&action=delete");            
            exit; 
        break;
        
  
    }

?>