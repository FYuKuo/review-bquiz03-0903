<?php
include('./base.php');
$no = $Order->math('MAX','id')+1;
$_POST['no'] = date('Ymd').str_pad($no,4,0,STR_PAD_LEFT);
$_POST['set'] = serialize($_POST['set']);

$Order->save($_POST);
echo $_POST['no'];
?>