<?php
include('./base.php');
$movie = $Movie->find($_GET['movie']);
$session = ['14:00~16:00','16:00~18:00','18:00~20:00','20:00~22:00','22:00~24:00'];

if(strtotime($_GET['date']) == strtotime(date('Y-m-d'))){
    $nowTime = floor(date('H')/2)+1;
    // echo $nowTime;
    // echo date('H');
    if($nowTime >= 8){
        $start = ($nowTime-8)+1;
    }else{
        $start = 0;
    }

    for ($i=$start; $i < 5; $i++) { 
        $order = $Order->math('SUM','qt',['movie'=>$_GET['movie'],'session'=>$session[$i],'date'=>$_GET['date']]);
        $set = 20-$order;
        echo "<option value='{$session[$i]}'>{$session[$i]} 剩餘座位 $set</option>";
    }

}else{

    for ($i=0; $i < 5; $i++) { 
        $order = $Order->math('SUM','qt',['movie'=>$_GET['movie'],'session'=>$session[$i],'date'=>$_GET['date']]);
        $set = 20-$order;
        echo "<option value='{$session[$i]}'>{$session[$i]} 剩餘座位 $set</option>";
    }


}


?>