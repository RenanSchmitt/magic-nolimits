
<?php
    require_once('inc.isAuth.php');
    require_once('inc.connect.php');
    if(isset($_GET['msg']) == true && $_GET['action'] == 'delete'){
        echo "<script type=\"text/javascript\">alert('Fornecedor excluido com sucesso!');</script>";
    }

    if(isset($_GET['msg']) == true && $_GET['action'] == 'update'){
        echo "<script type=\"text/javascript\">alert('Fornecedor alterado com sucesso!');</script>";
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<body>
<h2> Fornecedores adastrados:</h2>
<table class="table">
    <tr>
        <th> ID </th>
        <th> NOME </th>
        <th> ENDERECO </th>
        <th> ACÃO </th>
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
                    <a href="index.php?pg=atualizaforn&id_forn='.$linha['id_fornecedor'].'    ">Editar</a>
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


    