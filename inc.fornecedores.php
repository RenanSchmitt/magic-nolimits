
<?php
    require_once('inc.connect.php');
    if(isset($_GET['msg']) == true){
        echo "<script type=\"text/javascript\">alert('Fornecedor excluido com sucesso!');</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<body>
<table border="1" style="width: 80%; margin-left: 10%">
    <tr>
        <td> ID </td>
        <td> NOME </td>
        <td> ENDERECO </td>
        <td> ACÃO </td>
    <tr>
    
    <?php
        $query = 'SELECT id_fornecedor, nome, ende
        FROM fornecedor
        ORDER BY nome';
        
        $res = mysql_query($query, $link);

        $qtd = mysql_num_rows($res);

       

        if( $qtd > 0 ){
            while($linha = mysql_fetch_assoc($res)){
                echo '<tr>';
                echo '<td>'.$linha['id_fornecedor'].'</td>';
                echo '<td>'.$linha['nome'].'</td>';
                echo '<td>'.$linha['ende'].'</td>';

                echo '<td>
                    <a href="#">Editar</a>
                    <a href="acao_cadastroforn.php?acao=delete&id_fornecedor='.$linha['id_fornecedor'].'">Excluir</a>

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


    