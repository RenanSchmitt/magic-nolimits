<?php
session_start();
session_destroy();
header('Location: index.php?pg=home&msg=true&logoff=true');
exit;

?>