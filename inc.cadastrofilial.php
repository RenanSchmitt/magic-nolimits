<?PHP
    require_once('inc.isAuth.php');
    if(isset($_GET['msg']) == true){
        echo "<script type=\"text/javascript\">alert('Filial cadastrado!');</script>";
    }

?>

<form id="registro" action="acao_cadastrofilial.php" method="post">
    <legend>Digite as informações da filial:</legend>
    <fieldset>
        <p>
            <label for="nome">Nome: </label>
            <input name="nome" id="nome" type="text" size="30"/>
        </p>

        <p>
            <label for="ende">Endereço:</label>
            <input name="ende" id="ende" type="text" />
        </p>

        <input type="hidden" name="acao" value="insert">

    </fieldset>

    <p>
        <input type="submit" value="Enviar" id="enviar"/>
        <input type="reset" value="Limpar" id="reset"/>
    </p>

</form>