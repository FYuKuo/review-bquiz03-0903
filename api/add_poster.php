<?php
include('./base.php');

if(isset($_FILES['img']['tmp_name']) && $_FILES['img']['error'] == 0){

    move_uploaded_file($_FILES['img']['tmp_name'],'../upload/'.$_FILES['img']['name']);

    $poster['name'] = $_POST['name'];
    $poster['img'] = $_FILES['img']['name'];
    $poster['sh'] = 1;
    $poster['ani'] = rand(1,3);
    $poster['rank'] = $Poster->math('MAX','rank')+1;
    $Poster->save($poster);
}
to('../back.php?do=poster');
?>