<?php
include('./base.php');
if($_GET['acc'] == 'admin' && $_GET['pw'] == '1234'){
    $_SESSION['admin'] = $_GET['acc'];
    echo 1;
}else{
    echo 0;
}

?>