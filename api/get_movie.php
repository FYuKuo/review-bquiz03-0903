<?php
include('./base.php');
$selectID=$_GET['id'];
$now = date('Y-m-d');
$pre = date('Y-m-d',strtotime('-3 days'));
$rows = $Movie->all(" WHERE `sh` = 1 AND `date` BETWEEN '$pre' AND '$now' ORDER BY `rank` ");
foreach ($rows as $key => $row) {
    $selected = ($selectID == $row['id'])?'selected':'';
    echo "<option value='{$row['id']}' $selected>{$row['name']}</option>";
}
?>