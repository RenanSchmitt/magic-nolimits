<?php
    
    require_once('inc.connect.php');
    if(isset($_GET['msg']) == true){
        echo "<script type=\"text/javascript\">alert('Cliente cadastrado!');</script>";
    }
?>

<form id="registro" action="acao_registro.php" method="post">
    <legend>Digite suas informações:</legend>
    <fieldset>
        <p>
            <label for="nome">Nome: </label>
            <input name="nome" id="nome" type="text" size="30"/>
        </p>

        <p>
            <label for="nick">E-mail:</label>
            <input name="email" id="email" type="text" />
        </p>

        <p>
            <label for="senha">Senha:</label>
            <input name="senha" id="password" type="password" />
        </p> -->

        <input type="hidden" name="acao" value="insert">

    </fieldset>

    <p>
        <input type="submit" value="Enviar" id="enviar"/>
        <input type="reset" value="Limpar" id="reset"/>
    </p>

</form>