<?php
    require_once('inc.connect.php');
?>
<h2>Página ainda em desenvolvimento!</h2>
<!-- <img src="./images/construcao.png" width="500" height="500"> -->
<!DOCTYPE html>
<html lang="en">

<body>
<table border="1" style="width: 80%; margin-left: 10%">
    <tr>
        <td> ID </td>
        <td> NOME </td>
        <td> VALOR </td>
        <td> ACÃO </td>
    <tr>
    
    <?php
        $query = 'SELECT id_produto, nome, valor
        FROM produto
        ORDER BY nome';
        
        $res = mysql_query($query, $link);

        $qtd = mysql_num_rows($res);

       

        if( $qtd > 0 ){
            while($linha = mysql_fetch_assoc($res)){
                echo '<tr>';
                echo '<td>'.$linha['id_produto'].'</td>';
                echo '<td>'.$linha['nome'].'</td>';
                echo '<td>'.$linha['valor'].'</td>';

                echo '<td>
                    <a href="#">Editar</a>
                    <a href="#">Excluir</a>
                    </td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo "Não possui produtos cadastrados";
            echo '</tr>';
        }
        
        
    ?> 
</body>
</html>


    