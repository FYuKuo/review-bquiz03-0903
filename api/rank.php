<?php
include('./base.php');
$nowData = $Poster->find($_POST['id']);
$chData = $Poster->find($_POST['chId']);

$tmp = $nowData['rank'];
$nowData['rank'] = $chData['rank'];
$chData['rank'] = $tmp;

$Poster->save($nowData);
$Poster->save($chData);
?>