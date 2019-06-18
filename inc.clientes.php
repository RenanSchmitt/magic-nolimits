
<?php
      require_once('inc.connect.php');
      require_once('inc.isAuth.php');
      require_once('inc.funcao.php');
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
<h2>Clientes cadastrados:</h2>

<table class="table">
    <tr>
        <th> ID </th>
        <th> NOME </th>
        <th> EMAIL </th>
        <th> SENHA </th>
        <th> FOTO </th>
        <th> ACOES </th>
    <tr>
    
    <?php
        $clientes = mostraInformacoes('cliente', 'nome', $link);

        if( $clientes['qtd'] > 0 ){
            while($linha = mysql_fetch_assoc($clientes['res'])){
                echo '<tr>';
                echo '<td>'.$linha['id'].'</td>';
                echo '<td>'.$linha['nome'].'</td>';
                echo '<td>'.$linha['email'].'</td>';
                echo '<td>'.$linha['senha'].'</td>';
                echo '<td> <img src="./arquivo/img/clientes/'.$linha['img'].'" width="160px" height="160px"> </td>'; 
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


    