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

        <input type="hidden" name="acao" value="insert">

    </fieldset>

    <p>
        <input type="submit" value="Enviar" id="enviar"/>
        <input type="reset" value="Limpar" id="reset"/>
    </p>

</form>