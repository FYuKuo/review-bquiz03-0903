<div class="table_bg">
    <input type="button" value="新增電影" onclick="location.href='?do=add_movie'">
    <hr>
    <div class="movie_list_group">
    <?php
    $rows= $Movie->all(" ORDER BY `rank` ASC");
    foreach ($rows as $key => $row) {
        $pre = (isset($rows[$key-1]['id']))?$rows[$key-1]['id']:$row['id'];
        $next = (isset($rows[$key+1]['id']))?$rows[$key+1]['id']:$row['id'];
    ?>
    <div class="movie_list_bg d-f p-10">
        <div class="w-20 d-f a-c j-c">
            <img src="./upload/<?=$row['img']?>" alt="" style="height: 100%;">
        </div>
        <div class="w-20 d-f a-c j-c">
            分級: <img src="./icon/03C0<?=$row['type']?>.png" alt="">
        </div>
        <div class="w-60 d-f f-w">
            <div class="w-33">片名: <?=$row['name']?></div>
            <div class="w-33">片長: <?=$row['time']?></div>
            <div class="w-33" style="text-align: right;">上映時間: <?=$row['date']?></div>
            <div class="w-100" style="text-align: right;">
                <?php
                if($row['sh'] == 1){
                ?>
                <input type="button" value="顯示" onclick="sh(<?=$row['id']?>,'<?=$_GET['do']?>',0)">
                <?php
                }else{
                ?>
                <input type="button" value="隱藏" onclick="sh(<?=$row['id']?>,'<?=$_GET['do']?>',1)">
                <?php
                }
                ?>

                <input type="button" value="往上" onclick="rank(<?=$row['id']?>,<?=$pre?>,'<?=$_GET['do']?>')">
                <input type="button" value="往下" onclick="rank(<?=$row['id']?>,<?=$next?>,'<?=$_GET['do']?>')">
                <input type="button" value="編輯電影" onclick="location.href='?do=edit_movie&id=<?=$row['id']?>'">
                <input type="button" value="刪除電影" onclick="del(<?=$row['id']?>,'<?=$_GET['do']?>')">
            </div>
            <div class="w-100">
                劇情介紹:&nbsp;
            <?=$row['intro']?>
            </div>
        </div>
    </div>


    <?php
    }
    ?>
    </div>
</div>