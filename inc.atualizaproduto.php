<?php
    
    if(isset($_GET['msg']) == true){
        echo "<script type=\"text/javascript\">alert('Produto editado com sucesso!');</script>";
    }
    
    (isset($_REQUEST['id_prod']) and !empty($_REQUEST['id_prod'])) ? $id_prod = $_REQUEST['id_prod'] : $erro = true;
    
    require_once('inc.isAuth.php');
    require_once('inc.connect.php');

    $query = 'SELECT id_produto, nome, valor, id_filial, id_fornecedor, img FROM produto WHERE id_produto='.$id_prod;
    
    $res = mysql_query($query, $link) or die(mysql_error());
    $content = mysql_fetch_assoc($res);

    $query = 'SELECT id_fornecedor, nome
    FROM fornecedor';
    $res = mysql_query($query, $link) or die(mysql_error());

    $query2 = 'SELECT id_filial, nome
    FROM filial';
    $res2 = mysql_query($query2, $link) or die(mysql_error());
  

?>

<form id="registro" action="acao_cadastroprod.php" method="post" enctype="multipart/form-data">
    <legend>Digite as informações do produto:</legend>
    <fieldset>
        <p>
            <label for="nome">Nome: </label>
            <?php
                echo '<input name="nome" id="nome" type="text" size="30" value="'.$content['nome'].'"/>'
            ?>
           </p>

        <p>
            <label for="valor">Valor:</label>
            <?php
                echo '<input name="valor" id="valor" type="text" value="'.$content['valor'].'"/>';
            ?>
        </p>
        <label for="nome">Fornecedor: </label>
        <select name="fornecedor" id="fornecedor">
                <?php
                    $qtd = mysql_num_rows($res);
                        while($linha = mysql_fetch_assoc($res)){
                            if($linha['id_fornecedor']==$content['id_fornecedor']) {
                                echo '<option value="'.$linha['id_fornecedor'].'" selected> '.$linha['nome'].' </option>';
                            } else {
                                echo '<option value =" '.$linha['id_fornecedor'].'" >'.$linha['nome'].'</option>';
                            }
                        }
                        
                   
                ?>
        </select>
        
        <label for="nome">Filial: </label>
        <select name="filial" id="filial">
        <?php
                    $qtd2 = mysql_num_rows($res2);
                        while($linha2 = mysql_fetch_assoc($res2)){
                            if($linha2['id_filial']==$content['id_filial']) {
                                echo '<option value="'.$linha2['id_filial'].'" selected> '.$linha2['nome'].' </option>';
                            } else {
                                echo '<option value =" '.$linha2['id_filial'].'" >'.$linha2['nome'].'</option>';;
                            }
                        }
                        
                   
                ?>
        </select>

        <p> 
            <label for="file">Foto do Produto:</label>
            <input style="margin-left: 38%" type="file" id="file" name="arquivo">
        </p>

        <input type="hidden" name="acao" value="update">
        
        <?php
            echo '<input type="hidden" name="id_prod" value="'.$id_prod.'">';
            echo '<input type="hidden" name="id" value="'.$id_prod.'">';

        ?>

    </fieldset>

    <p>
        <input type="submit" value="Enviar" id="enviar"/>
        <input type="reset" value="Limpar" id="reset"/>
    </p>

</form>