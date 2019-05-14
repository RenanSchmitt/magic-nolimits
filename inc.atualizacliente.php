<?php
   
    (isset($_REQUEST['id_cli']) and !empty($_REQUEST['id_cli'])) ? $id_cli = $_REQUEST['id_cli'] : $erro = true;
    
    require_once('inc.connect.php');

    $query = 'SELECT id, nome, email, senha
    FROM cliente WHERE id='.$id_cli;
    $res = mysql_query($query, $link) or die(mysql_error());
    $content = mysql_fetch_assoc($res);

    

?>

<form id="registro" action="acao_registro.php" method="post">
    <legend>Digite as informações do fornecedor:</legend>
    <fieldset>
        <p>
            <label for="nome">Nome: </label>
            <?php
                echo '<input name="nome" id="nome" type="text" size="30" value="'.$content['nome'].'"/>'
            ?>
           </p>

        <p>
            <label for="email">E-mail:</label>
            <?php
                echo '<input name="email" id="email" type="text" value="'.$content['email'].'"/>';
            ?>
        </p>

        <p>
            <label for="senha">Senha:</label>
            <?php
                echo '<input name="senha" id="senha" type="text" value="'.$content['senha'].'"/>';
            ?>
        </p>
     
        <input type="hidden" name="acao" value="update">
        
        <?php
            echo '<input type="hidden" name="id_cli" value="'.$id_cli.'">'
        ?>

    </fieldset>

    <p>
        <input type="submit" value="Enviar" id="enviar"/>
        <input type="reset" value="Limpar" id="reset"/>
    </p>

</form>