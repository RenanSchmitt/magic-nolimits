<?php
 print_r($_FILES);

 $nome = $_FILES['arquivo']['name'];
 $tmp_nome = $_FILES['arquivo']['tmp_name'];

 $data_agora = date("YmdHis");
 echo $data_agora;


$dir = 'arquivo/img/';
move_uploaded_file($tmp_nome, $dir.$nome);


?>