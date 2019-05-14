<?php
    require_once('inc.connect.php');
    print_r($_POST);

    (isset($_POST['nome']) and !empty($_POST['nome'])) ? $nome = $_POST['nome'] : $erro = true;
    
    (isset($_POST['ende']) and !empty($_POST['ende'])) ? $ende = $_POST['ende'] : $erro = true;

    (isset($_REQUEST['acao']) and !empty($_REQUEST['acao'])) ? $acao = $_REQUEST['acao'] : $erro = true;

    (isset($_POST['id_fil']) and !empty($_POST['id_fil'])) ? $id_fil = $_POST['id_fil'] : $erro = true;
    

    switch ($acao) {
        case 'insert':
            echo 'inserir registro';
            
            $query = 'INSERT INTO filial (
                nome,
                ende)

                VALUES("'.$nome.'",
                "'.$ende.'")';
                           
            mysql_query($query, $link) or die(mysql_error());
            mysql_close();
            header("Location: index.php?pg=cadastrofilial&msg=true");
            exit; 
            break;
        case 'update':
            echo 'update';

            $query = 'UPDATE filial SET nome = "'.$nome.'", ende = "'.$ende.'" WHERE id_filial = '.$id_fil;

            echo $query;
            mysql_query($query, $link) or die(mysql_error());
            mysql_close();
            header("Location: index.php?pg=filial&msg=true&action=update");
            exit; 
        break;
        case 'delete':
            echo 'delete';
            (isset($_GET['id_filial']) and !empty($_GET['id_filial'])) ? $id_filial = $_GET['id_filial'] : $erro = true;

            $query = 'DELETE FROM filial 
            WHERE id_filial = '.$id_filial;  
            
            mysql_query($query, $link) or die(mysql_error());
            mysql_close();
            header("Location: index.php?pg=filial&msg=true&action=delete");
            exit; 
        break;
     

    }


?>