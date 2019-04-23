<?php
    require_once('inc.connect.php');
    print_r($_POST);

    (isset($_POST['id_produto']) and !empty($_POST['id_produto'])) ? $id_produto = $_POST['id_produto'] : $erro = true;

    (isset($_POST['qtd']) and !empty($_POST['qtd'])) ? $qtd = $_POST['qtd'] : $erro = true;

    (isset($_POST['valor']) and !empty($_POST['valor'])) ? $valor = $_POST['valor'] : $erro = true;

    (isset($_POST['filial']) and !empty($_POST['filial'])) ? $filial = $_POST['filial'] : $erro = true;

    (isset($_POST['acao']) and !empty($_POST['acao'])) ? $acao = $_POST['acao'] : $erro = true;

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
        break;
        
  
    }

?>