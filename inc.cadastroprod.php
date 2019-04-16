<?php
    require_once('inc.connect.php');
    $query = 'SELECT id_fornecedor, nome
    FROM fornecedor';
    $res = mysql_query($query, $link) or die(mysql_error());
    
?>

<form id="registro" action="acao_cadastroprod.php" method="post">
    <legend>Digite as informações do produto:</legend>
    <fieldset>
        <p>
            <label for="nome">Nome: </label>
            <input name="nome" id="nome" type="text" size="30"/>
        </p>

        <p>
            <label for="valor">Valor:</label>
            <input name="valor" id="valor" type="text" />
        </p>
        <label for="nome">Fornecedor: </label>
        <select name="fornecedor" id="fornecedor">
                <?php
                    $qtd = mysql_num_rows($res);
                    echo $qtd;
                    if ($qtd > 0){
                        while($linha = mysql_fetch_assoc($res)){
                            echo '<option value="'.$linha['id_fornecedor'].'"> '.$linha['nome'].' </option>';
                            
                        }
                    } else {
                        echo '<option value="Não há fornecedores"> Não há fornecedores</option>';
                    }
                ?>
        </select>

        <input type="hidden" name="acao" value="insert">

    </fieldset>

    <p>
        <input type="submit" value="Enviar" id="enviar"/>
        <input type="reset" value="Limpar" id="reset"/>
    </p>

</form>