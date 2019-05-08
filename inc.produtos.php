<?php
    require_once('inc.connect.php');
    if(isset($_GET['msg']) == true && $_GET['action'] == 'delete'){
        echo "<script type=\"text/javascript\">alert('Produto excluido com sucesso!');</script>";
    }

    if(isset($_GET['msg']) == true && $_GET['action'] == 'update'){
        echo "<script type=\"text/javascript\">alert('Produto alterado com sucesso!');</script>";
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
        <td> NOME </td>
        <td> VALOR </td>
        <td> FILIAL </td>
        <td> FORNECEDOR </td>
        <td> ACÃO </td>
    <tr>
    
    <?php
        $query = 'SELECT id_produto, nome, valor, id_filial, id_fornecedor
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
                echo '<td>'.$linha['id_filial'].'</td>';
                echo '<td>'.$linha['id_fornecedor'].'</td>';

                echo '<td>
                     <a href="index.php?pg=atualizaproduto&id_prod='.$linha['id_produto'].'    ">Editar</a>
                    <a href="acao_cadastroprod.php?acao=delete&id_produto='.$linha['id_produto'].'">Excluir</a>
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


    