<?php
    require_once('inc.connect.php');
    require_once('inc.funcao.php');

    (isset($_POST['nome']) and !empty($_POST['nome'])) ? $form['nome'] = $_POST['nome'] : $erro = true;

    (isset($_POST['ende']) and !empty($_POST['ende'])) ? $form['ende'] = $_POST['ende'] : $erro = true;

    (isset($_REQUEST['acao']) and !empty($_REQUEST['acao'])) ? $acao = $_REQUEST['acao'] : $erro = true;

    (isset($_POST['id_forn']) and !empty($_POST['id_forn'])) ? $id_forn = $_POST['id_forn'] : $erro = true;
    
    switch ($acao) {
        case 'insert':
            insertForn($form, $link);
            header("Location: index.php?pg=cadastroforn&msg=true");
            exit; 
        break;
        case 'update':
            echo 'update';
            updateItem('fornecedor', $form, $link, $id_forn);
            header("Location: index.php?pg=fornecedores&msg=true&action=update");
            exit;  

        break;
        case 'delete':
            echo 'delete';
            (isset($_GET['id_fornecedor']) and !empty($_GET['id_fornecedor'])) ? $id_fornecedor = $_GET['id_fornecedor'] : $erro = true;

            deleteItem('fornecedor', $id_fornecedor, $link);
            header("Location: index.php?pg=fornecedores&msg=true&action=delete");
            exit; 
        break;
        

    }


?>