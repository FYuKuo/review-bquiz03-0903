<?php
include('./base.php');
if(isset($_FILES['img']['tmp_name']) && $_FILES['img']['error'] == 0){

    move_uploaded_file($_FILES['img']['tmp_name'],'../upload/'.$_FILES['img']['name']);
    $_POST['img'] = $_FILES['img']['name'];
}

if(isset($_FILES['movie']['tmp_name']) && $_FILES['movie']['error'] == 0){

    move_uploaded_file($_FILES['movie']['tmp_name'],'../upload/'.$_FILES['movie']['name']);
    $_POST['movie'] = $_FILES['movie']['name'];
}

$_POST['date'] = $_POST['year']."-".$_POST['month']."-".$_POST['day'];

unset($_POST['year'],$_POST['month'],$_POST['day']);

$_POST['sh'] = 1;
$_POST['rank'] = $Movie->math('MAX','rank')+1;

// dd($_POST);
$Movie->save($_POST);
to('../back.php?do=movie');
?>