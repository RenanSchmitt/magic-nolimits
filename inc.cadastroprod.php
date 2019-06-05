<?php
    require_once('inc.isAuth.php');
    require_once('inc.connect.php');
    if(isset($_GET['msg']) == true){
        echo "<script type=\"text/javascript\">alert('Produto cadastrado!');</script>";
    }
    
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
            <input name="nome" id="nome" type="text" size="30"/>
        </p>

        <p>
            <label for="valor">Valor:</label>
            <input name="valor" id="valor" type="text" />
        </p>
        
        <label for="nome">Fornecedor: </label>
        <select  name="fornecedor" id="fornecedor">
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
        <br>
        
        <label for="nome">Filial: </label>
        <select name="filial" id="filial">
                <?php
                    $qtd2 = mysql_num_rows($res2);
                    echo $qtd2;
                    if ($qtd2 > 0){
                        while($linha2 = mysql_fetch_assoc($res2)){
                            echo '<option value="'.$linha2['id_filial'].'"> '.$linha2['nome'].' </option>';
                            
                        }
                    } else {
                        echo '<option value="Não há filial"> Não há filial</option>';
                    }
                ?>
        </select>

        <p> 
            <label for="file">Foto de Perfil:</label>
            <input style="margin-left: 38%" type="file" id="file" name="arquivo">
        </p>

        <input type="hidden" name="acao" value="insert">

    </fieldset>

    <p>
        <input type="submit" value="Enviar" id="enviar"/>
        <input type="reset" value="Limpar" id="reset"/>
    </p>

</form>