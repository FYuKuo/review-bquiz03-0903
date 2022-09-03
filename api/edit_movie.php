<?php
include('./base.php');
$data = $Movie->find($_POST['id']);

if(isset($_FILES['img']['tmp_name']) && $_FILES['img']['error'] == 0){

    move_uploaded_file($_FILES['img']['tmp_name'],'../upload/'.$_FILES['img']['name']);
    $_POST['img'] = $_FILES['img']['name'];
}else{
    $_POST['img'] = $data['img'];

}

if(isset($_FILES['movie']['tmp_name']) && $_FILES['movie']['error'] == 0){

    move_uploaded_file($_FILES['movie']['tmp_name'],'../upload/'.$_FILES['movie']['name']);
    $_POST['movie'] = $_FILES['movie']['name'];
}else{
    $_POST['movie'] = $data['movie'];

}

$_POST['date'] = $_POST['year']."-".$_POST['month']."-".$_POST['day'];

unset($_POST['year'],$_POST['month'],$_POST['day']);

$_POST['sh'] = $data['sh'];
$_POST['rank'] = $data['rank'];


$Movie->save($_POST);
to('../back.php?do=movie');
?>