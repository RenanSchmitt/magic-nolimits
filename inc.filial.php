<?php
    require_once('inc.connect.php');
    require_once('inc.funcao.php');

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
<h2>Filiais cadastradas:</h2>

<table class="table">
    <tr>
        <th> ID </th>
        <th> NOME </th>
        <th> ENDERECO </th>
        <?php
            if(isset($_SESSION) and !empty($_SESSION)){                            
                echo '<th> ACÃO </th>';
            }
        ?>
    <tr>
    
    <?php
        $filiais = mostraInformacoes('filial', 'nome', $link);

        if( $filiais['qtd'] > 0 ){
            while($linha = mysql_fetch_assoc($filiais['res'])){
                echo '<tr>';
                echo '<td>'.$linha['id_filial'].'</td>';
                echo '<td>'.$linha['nome'].'</td>';
                echo '<td>'.$linha['ende'].'</td>';

                if(isset($_SESSION) and !empty($_SESSION)){
                    echo '<td>
                        <a href="index.php?pg=atualizafilial&id_fil='.$linha['id_filial'].'    ">Editar</a>                    
                        <a href="acao_cadastrofilial.php?acao=delete&id_filial='.$linha['id_filial'].'">Excluir</a>

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


    