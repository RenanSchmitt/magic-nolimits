<?php
    require_once('inc.connect.php');
    print_r($_POST);

    (isset($_POST['nome']) and !empty($_POST['nome'])) ? $nome = $_POST['nome'] : $erro = true;

    (isset($_POST['email']) and !empty($_POST['email'])) ? $email = $_POST['email'] : $erro = true;

    (isset($_POST['senha']) and !empty($_POST['senha'])) ? $senha = $_POST['senha'] : $erro = true;

    (isset($_REQUEST['acao']) and !empty($_REQUEST['acao'])) ? $acao = $_REQUEST['acao'] : $erro = true;

    (isset($_POST['id_cli']) and !empty($_POST['id_cli'])) ? $id_cli = $_POST['id_cli'] : $erro = true;
    

    switch ($acao) {
        case 'insert':
            echo 'inserir registro';
            
            $nome_image = $_FILES['arquivo']['name'];
            $tmp_nome = $_FILES['arquivo']['tmp_name']; 
            $dir = 'arquivo/img/clientes/';
            if($nome_image == null){
                $nome_image = "img-default.jpg";
            }
            move_uploaded_file($tmp_nome, $dir.$nome_image);
            $query = 'INSERT INTO cliente (
                nome,
                email,
                senha,
                img)
            VALUES("'.$nome.'",
                "'.$email.'","'.$senha.'","'.$nome_image.'")';
                mysql_query($query, $link) or die(mysql_error());
                mysql_close();
                header("Location: index.php?pg=registro&msg=true");
                exit; 
        case 'update':
            echo 'update';

            $nome_image = $_FILES['arquivo']['name'];
            $tmp_nome = $_FILES['arquivo']['tmp_name']; 
            $dir = 'arquivo/img/clientes/';

            if($nome_image == NULL){
                
                $query = 'UPDATE cliente SET nome = "'.$nome.'", email = "'.$email.'", senha = "'.$senha.'" WHERE id = '.$id_cli;
                mysql_query($query, $link) or die(mysql_error());
                mysql_close();
            } else {
                $query = 'SELECT img FROM cliente WHERE id='.$id_cli;
                $res = mysql_query($query, $link) or die(mysql_error());
                $content = mysql_fetch_assoc($res);
                $image = $content['img'];
                $del = "./arquivo/img/clientes/$image";
                if($image != "img-default.jpg"){
                    unlink($del);
                    $dir = 'arquivo/img/clientes/';
                    move_uploaded_file($tmp_nome, $dir.$nome_image);
                }         
                $query = 'UPDATE cliente SET nome = "'.$nome.'", email = "'.$email.'", senha = "'.$senha.'", img = "'.$nome_image.'" WHERE id = '.$id_cli;
                mysql_query($query, $link) or die(mysql_error());
                mysql_close();
            }            
            header("Location: index.php?pg=clientes&msg=true&action=update");
            exit; 
                
        case 'delete':
                echo 'delete';
                echo 'delete';
                (isset($_GET['id']) and !empty($_GET['id'])) ? $id = $_GET['id'] : $erro = true;
                
                $query = 'SELECT img FROM cliente WHERE id='.$id;
    
                $res = mysql_query($query, $link) or die(mysql_error());
                $content = mysql_fetch_assoc($res);
                $image = $content['img'];
                $del = "./arquivo/img/clientes/$image";
                unlink($del);
                $query = 'DELETE FROM cliente 
                WHERE id = '.$id;  
                
                mysql_query($query, $link) or die(mysql_error());
                mysql_close();
                header("Location: index.php?pg=clientes&msg=true&action=delete");
                exit;
                break;

    }


?>