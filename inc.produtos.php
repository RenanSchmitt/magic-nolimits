<?php
    require_once('inc.connect.php');
    require_once('inc.funcao.php');

    if(isset($_GET['msg']) == true && $_GET['action'] == 'delete'){
        echo "<script type=\"text/javascript\">alert('Produto excluido com sucesso!');</script>";
    }

    if(isset($_GET['msg']) == true && $_GET['action'] == 'update'){
        echo "<script type=\"text/javascript\">alert('Produto alterado com sucesso!');</script>";
    }

?>
<h2>Produtos cadastrados:</h2>
<!-- <img src="./images/construcao.png" width="500" height="500"> -->
<!DOCTYPE html>
<html lang="en">

<body>
<table class="table" >
    <tr >
        <th> ID </th>
        <th> NOME </th>
        <th> VALOR </th>
        <th> FILIAL </th>
        <th> FORNECEDOR </th>
        <th> FOTO </th>
        <?php
            if(isset($_SESSION) and !empty($_SESSION)){                            
                echo '<th> ACÃO </th>';
            }
        ?>
    <tr>
    
    <?php
        $produtos = mostraInformacoes('produto', 'nome', $link);

        if( $produtos['qtd'] > 0 ){
            while($linha = mysql_fetch_assoc($produtos['res'])){
                echo '<tr>';
                echo '<td>'.$linha['id_produto'].'</td>';
                echo '<td>'.$linha['nome'].'</td>';
                echo '<td>'.$linha['valor'].'</td>';
                echo '<td>'.$linha['id_filial'].'</td>';
                echo '<td>'.$linha['id_fornecedor'].'</td>';
                echo '<td> <img src="./arquivo/img/prod/'.$linha['img'].'" width="160px" height="160px"> </td>'; 
                if(isset($_SESSION) and !empty($_SESSION)){                                            
                    echo '<td>
                        <a href="index.php?pg=atualizaproduto&id_prod='.$linha['id_produto'].'    ">Editar</a>
                        <a href="acao_cadastroprod.php?acao=delete&id_produto='.$linha['id_produto'].'&image='.$linha['img'].'">Excluir</a>
                        </td>';
                }
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


    