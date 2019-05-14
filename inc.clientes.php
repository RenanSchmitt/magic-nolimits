
<?php
      require_once('inc.connect.php');
      if(isset($_GET['msg']) == true && $_GET['action'] == 'delete'){
          echo "<script type=\"text/javascript\">alert('Cliente excluido com sucesso!');</script>";
      }
  
      if(isset($_GET['msg']) == true && $_GET['action'] == 'update'){
          echo "<script type=\"text/javascript\">alert('Cliente alterado com sucesso!');</script>";
      }
?>
<!DOCTYPE html>
<html lang="en">

<body>
<table border="1" style="width: 80%; margin-left: 10%">
    <tr>
        <td> ID </td>
        <td> NOME </td>
        <td> EMAIL </td>
        <td> SENHA </td>
        <td> ACOES </td>
    <tr>
    
    <?php
        $query = 'SELECT id, nome, email, senha
        FROM cliente
        ORDER BY nome';
        
        $res = mysql_query($query, $link);

        $qtd = mysql_num_rows($res);

       

        if( $qtd > 0 ){
            while($linha = mysql_fetch_assoc($res)){
                echo '<tr>';
                echo '<td>'.$linha['id'].'</td>';
                echo '<td>'.$linha['nome'].'</td>';
                echo '<td>'.$linha['email'].'</td>';
                echo '<td>'.$linha['senha'].'</td>';

                echo '<td>
                    <a href="index.php?pg=atualizacliente&id_cli='.$linha['id'].'    ">Editar</a>
                    <a href="acao_registro.php?acao=delete&id='.$linha['id'].'">Excluir</a>
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


    