<?php
    
    if(isset($_GET['msg']) == true){
        echo "<script type=\"text/javascript\">alert('Fornecedor editado com sucesso!');</script>";
    }
    
    (isset($_REQUEST['id_forn']) and !empty($_REQUEST['id_forn'])) ? $id_forn = $_REQUEST['id_forn'] : $erro = true;
    
    require_once('inc.connect.php');

    $query = 'SELECT id_fornecedor, nome, ende
    FROM fornecedor WHERE id_fornecedor='.$id_forn;
    $res = mysql_query($query, $link) or die(mysql_error());
    $content = mysql_fetch_assoc($res);

    

?>

<form id="registro" action="acao_cadastroforn.php" method="post">
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
            echo '<input type="hidden" name="id_forn" value="'.$id_forn.'">'
        ?>

    </fieldset>

    <p>
        <input type="submit" value="Enviar" id="enviar"/>
        <input type="reset" value="Limpar" id="reset"/>
    </p>

</form>