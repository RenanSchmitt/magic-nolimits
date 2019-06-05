<?php
    require_once('inc.isAuth.php');
    require_once('inc.connect.php');
    if(isset($_GET['msg']) == true && $_GET['action'] == 'delete'){
        echo "<script type=\"text/javascript\">alert('Venda excluido com sucesso!');</script>";
    }

    if(isset($_GET['msg']) == true && $_GET['action'] == 'update'){
        echo "<script type=\"text/javascript\">alert('Venda alterado com sucesso!');</script>";
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<h2>Vendas cadastradas:</h2>
<body>
<table class="table">
    <tr>
        <th> ID </th>
        <th> Produto ID </th>
        <th> QUANTIDADE </th>
        <th> VALOR </th>
        <th> ID_VENDA </th>
        <th> ACÃO </th>
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


    