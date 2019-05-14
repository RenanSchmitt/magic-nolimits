<?php
    require_once('inc.connect.php');
    if(isset($_GET['msg']) == true && $_GET['action'] == 'delete'){
        echo "<script type=\"text/javascript\">alert('Venda excluido com sucesso!');</script>";
    }

    if(isset($_GET['msg']) == true && $_GET['action'] == 'update'){
        echo "<script type=\"text/javascript\">alert('Venda alterado com sucesso!');</script>";
    }
?>
<h2>Página ainda em desenvolvimento!</h2>
<!-- <img src="./images/construcao.png" width="500" height="500"> -->
<!DOCTYPE html>
<html lang="en">

<body>
<table border="1" style="width: 80%; margin-left: 10%">
    <tr>
        <td> ID </td>
        <td> Produto ID </td>
        <td> QUANTIDADE </td>
        <td> VALOR </td>
        <td> ID_VENDA </td>
        <td> ACÃO </td>
    <tr>
    
    <?php
        $query = 'SELECT id_venda_itens, id_produto, qtd, valor, id_venda
        FROM venda_itens
        ORDER BY id_venda_itens';
        
        $res = mysql_query($query, $link);

        $qtd = mysql_num_rows($res);

       

        if( $qtd > 0 ){
            while($linha = mysql_fetch_assoc($res)){
                echo '<tr>';
                echo '<td>'.$linha['id_venda_itens'].'</td>';
                echo '<td>'.$linha['id_produto'].'</td>';
                echo '<td>'.$linha['qtd'].'</td>';
                echo '<td>'.$linha['valor'].'</td>';
                echo '<td>'.$linha['id_venda'].'</td>';

                echo '<td>
                    <a href="index.php?pg=atualizavenda&id_v='.$linha['id_venda_itens'].'    ">Editar</a>                                        
                    <a href="acao_cadastrovenda.php?acao=delete&id_venda_itens='.$linha['id_venda_itens'].'">Excluir</a>
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


    