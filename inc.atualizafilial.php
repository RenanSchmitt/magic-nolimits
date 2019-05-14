<?php
   
    (isset($_REQUEST['id_fil']) and !empty($_REQUEST['id_fil'])) ? $id_fil = $_REQUEST['id_fil'] : $erro = true;
    
    require_once('inc.connect.php');

    $query = 'SELECT id_filial, nome, ende
    FROM filial WHERE id_filial='.$id_fil;
    $res = mysql_query($query, $link) or die(mysql_error());
    $content = mysql_fetch_assoc($res);

    

?>

<form id="registro" action="acao_cadastrofilial.php" method="post">
    <legend>Digite as informações do fornecedor:</legend>
    <fieldset>
        <p>
            <label for="nome">Nome: </label>
            <?php
                echo '<input name="nome" id="nome" type="text" size="30" value="'.$content['nome'].'"/>'
            ?>
           </p>

        <p>
            <label for="ende">Endereço:</label>
            <?php
                echo '<input name="ende" id="ende" type="text" value="'.$content['ende'].'"/>';
            ?>
        </p>
     
        <input type="hidden" name="acao" value="update">
        
        <?php
            echo '<input type="hidden" name="id_fil" value="'.$id_fil.'">'
        ?>

    </fieldset>

    <p>
        <input type="submit" value="Enviar" id="enviar"/>
        <input type="reset" value="Limpar" id="reset"/>
    </p>

</form>