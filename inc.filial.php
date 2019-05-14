<?php
    require_once('inc.connect.php');
    if(isset($_GET['msg']) == true && $_GET['action'] == 'delete'){
        echo "<script type=\"text/javascript\">alert('Filial excluido com sucesso!');</script>";
    }

    if(isset($_GET['msg']) == true && $_GET['action'] == 'update'){
        echo "<script type=\"text/javascript\">alert('Filial alterado com sucesso!');</script>";
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
        $query = 'SELECT id_filial, nome, ende
        FROM filial
        ORDER BY nome';
        
        $res = mysql_query($query, $link);

        $qtd = mysql_num_rows($res);

       

        if( $qtd > 0 ){
            while($linha = mysql_fetch_assoc($res)){
                echo '<tr>';
                echo '<td>'.$linha['id_filial'].'</td>';
                echo '<td>'.$linha['nome'].'</td>';
                echo '<td>'.$linha['ende'].'</td>';

                echo '<td>
                    <a href="index.php?pg=atualizafilial&id_fil='.$linha['id_filial'].'    ">Editar</a>                    
                    <a href="acao_cadastrofilial.php?acao=delete&id_filial='.$linha['id_filial'].'">Excluir</a>

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


    