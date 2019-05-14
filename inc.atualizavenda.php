<?php
    
    
    (isset($_REQUEST['id_v']) and !empty($_REQUEST['id_v'])) ? $id_v = $_REQUEST['id_v'] : $erro = true;
    
    require_once('inc.connect.php');
    $query = 'SELECT id_venda_itens, id_produto, qtd, valor FROM venda_itens WHERE id_venda_itens='.$id_v;
    
    $res = mysql_query($query, $link) or die(mysql_error());
    $content = mysql_fetch_assoc($res);

    $query2 = 'SELECT id_produto, nome
    FROM produto';
    $res2 = mysql_query($query2, $link) or die(mysql_error());
    $content2 = mysql_fetch_assoc($res2);
    $qtd = mysql_num_rows($res2);


?>

<form id="registro" action="acao_cadastrovenda.php" method="post">
    <legend>Digite as informações da venda:</legend>
    <fieldset>


        <select name="id_produto" id="id_produto">
                <?php
                    $qtd = mysql_num_rows($res2);
                    echo $qtd;
                    if ($qtd > 0){
                        while($linha = mysql_fetch_assoc($res2)){
                            echo '<option value="'.$linha['id_produto'].'"> '.$linha['nome'].' </option>';
                            
                        }
                    } else {
                        echo '<option value="Não há fornecedores"> Não há fornecedores</option>';
                    }
                ?>
        </select>

        <p>
            <label for="qtd">Quantidade:</label>
            <?php
                echo '<input name="qtd" id="qtd" type="text" value="'.$content['qtd'].'"/>';
            ?>
        </p>
        

        <p>
            <label for="valor">Valor:</label>
            <?php
                echo '<input name="valor" id="valor" type="text" value="'.$content['valor'].'"/>';
            ?>
        </p>
        
        <input type="hidden" name="acao" value="update">
        
        <?php
            echo '<input type="hidden" name="id_v" value="'.$id_v.'">'
        ?>

    </fieldset>

    <p>
        <input type="submit" value="Enviar" id="enviar"/>
        <input type="reset" value="Limpar" id="reset"/>
    </p>

</form>