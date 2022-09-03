<?php
include('./base.php');
$movie = $Movie->find($_GET['movie']);
$day = abs((strtotime($movie['date'])-strtotime(date('Y-m-d')))/60/60/24);

for ($i=0; $i <= $day  ; $i++) { 
    $newDay = date("Y-m-d",strtotime("+$i days"));
    $newDayStr = date("m月d日 l",strtotime("+$i days"));

    echo "<option value='$newDay'>$newDayStr</option>";
}

// dd($movie);
?>