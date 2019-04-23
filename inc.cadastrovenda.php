<?php
    
    if(isset($_GET['msg']) == true){
        echo "<script type=\"text/javascript\">alert('Venda cadastrada!');</script>";
    }
    
    require_once('inc.connect.php');
    $query = 'SELECT id_produto, nome , valor 
    FROM produto';
    $res = mysql_query($query, $link) or die(mysql_error());
    
    // $query2 = 'SELECT id_filial, nome
    // FROM filial';
    // $res2 = mysql_query($query2, $link) or die(mysql_error());
    
?>

<form id="cadastrovenda" action="acao_cadastrovenda.php" method="post">
    <legend>Digite as informações do produto:</legend>
    <fieldset>
    <label for="nome">Produto: </label>
    <select name="id_produto" id="id_produto">
            <?php
                $qtd = mysql_num_rows($res);
                echo $qtd;
                if ($qtd > 0){
                    while($linha = mysql_fetch_assoc($res)){
                        echo '<option value="'.$linha['id_produto'].'"> '.$linha['nome'].' </option>';
                        
                    }
                } else {
                    echo '<option value="Não há filial"> Não há filial</option>';
                }
            ?>
    </select>
        <p>
            <label for="qtd">Quantidade: </label>
            <input name="qtd" id="qtd" type="text" size="30"/>
        </p>

        <p>
            <label for="valor">valor:</label>
            <input name="valor" id="valor" type="text" />
        </p>        

        <input type="hidden" name="acao" value="insert">

    </fieldset>

    <p>
        <input type="submit" value="Enviar" id="enviar"/>
        <input type="reset" value="Limpar" id="reset"/>
    </p>

</form>