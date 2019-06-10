<?php
    require_once('inc.connect.php');
   

    (isset($_POST['nome']) and !empty($_POST['nome'])) ? $nome = $_POST['nome'] : $erro = true;

    (isset($_POST['valor']) and !empty($_POST['valor'])) ? $valor = $_POST['valor'] : $erro = true;

    (isset($_POST['fornecedor']) and !empty($_POST['fornecedor'])) ? $fornecedor = $_POST['fornecedor'] : $erro = true;

    (isset($_POST['filial']) and !empty($_POST['filial'])) ? $filial = $_POST['filial'] : $erro = true;

    (isset($_REQUEST['acao']) and !empty($_REQUEST['acao'])) ? $acao = $_REQUEST['acao'] : $erro = true;

    (isset($_POST['id_prod']) and !empty($_POST['id_prod'])) ? $id_prod = $_POST['id_prod'] : $erro = true;


    switch ($acao) {
        case 'insert':
            echo 'inserir registro';
            
                        
            $nome_image = $_FILES['arquivo']['name'];
            $tmp_nome = $_FILES['arquivo']['tmp_name']; 
            $dir = 'arquivo/img/prod/';
            if($nome_image == null){
                $nome_image = "prod-default.gif";
            }
            move_uploaded_file($tmp_nome, $dir.$nome_image);
            

            $query = 'INSERT INTO produto (
                nome,
                valor,
                id_fornecedor,
                id_filial,
                img)

                VALUES("'.$nome.'",
                "'.$valor.'",
                "'.$fornecedor.'",
                "'.$filial.'",
                "'.$nome_image.'"
                )';

            echo $query;
            mysql_query($query, $link) or die(mysql_error());
            mysql_close();
            header("Location: index.php?pg=cadastroprod&msg=true");
            exit;  
            
        
        break;
        case 'update':

            $nome_image = $_FILES['arquivo']['name'];
            $tmp_nome = $_FILES['arquivo']['tmp_name']; 
            $dir = 'arquivo/img/prod/';

            if($nome_image == NULL){
                $query = 'UPDATE produto SET nome = "'.$nome.'", valor = "'.$valor.'", id_fornecedor = "'.$fornecedor.'", id_filial = "'.$filial.'" WHERE id_produto = '.$id_prod;
                mysql_query($query, $link) or die(mysql_error());
                mysql_close();
            } else {
                $query = 'SELECT img FROM produto WHERE id_produto='.$id_prod;
                $res = mysql_query($query, $link) or die(mysql_error());
                $content = mysql_fetch_assoc($res);
                $image = $content['img'];
                $del = "./arquivo/img/prod/$image";
                if($image != "prod-default.gif"){
                    unlink($del);
                    $dir = 'arquivo/img/prod/';
                    move_uploaded_file($tmp_nome, $dir.$nome_image);
                } 
                $dir = 'arquivo/img/prod/';
                move_uploaded_file($tmp_nome, $dir.$nome_image);
                $query = 'UPDATE produto SET nome = "'.$nome.'", valor = "'.$valor.'", id_fornecedor = "'.$fornecedor.'", id_filial = "'.$filial.'", img = "'.$nome_image.'" WHERE id_produto = '.$id_prod;
                mysql_query($query, $link) or die(mysql_error());
                mysql_close();
                header("Location: index.php?pg=produtos&msg=true&action=update");                
                exit; 
            }
            header("Location: index.php?pg=produtos&msg=true&action=update");
            exit; 
        break;
        case 'delete':
            echo 'delete';
            (isset($_GET['id_produto']) and !empty($_GET['id_produto'])) ? $id_contato = $_GET['id_produto'] : $erro = true;
            
            $query = 'SELECT img FROM produto WHERE id_produto='.$id_contato;
    
            $res = mysql_query($query, $link) or die(mysql_error());
            $content = mysql_fetch_assoc($res);
            $image = $content['img'];
            $del = "./arquivo/img/prod/$image";
            if($image != "prod-default.gif"){
                unlink($del);
            }
            $query = 'DELETE FROM produto 
            WHERE id_produto = '.$id_contato;  
            mysql_query($query, $link) or die(mysql_error());
            mysql_close();
            header("Location: index.php?pg=produtos&msg=true&action=delete");
            exit; 
            
        break;
        
  
    }

?>