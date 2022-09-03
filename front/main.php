<?php
$rows = $Poster->all(['sh'=>1]," ORDER BY `rank`");
?>
<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div class="poster">
            <div class="lists d-f j-c">
                <?php
                foreach ($rows as $key => $row) {
                ?>
                <div class="ct bb poster_item" data-id="<?=$row['id']?>" data-ani="<?=$row['ani']?>">
                    <img src="./upload/<?=$row['img']?>" alt="">
                    <div>
                        <?=$row['name']?>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <div class="controls d-f a-c">
                <div class="pre_btn bb d-f a-c j-c" onclick="move('left')"></div>
                <div class="controls_nav d-f a-c">
                    
                    <div class="controls_img d-f">
                    <?php
                    foreach ($rows as $key => $row) {
                    ?>
                    <div class="img_item d-f" onclick="changeAni(<?=$key?>)">
                        <img src="./upload/<?=$row['img']?>" alt="">
                    </div>
                    <?php
                    }
                    ?>
                    </div>
                </div>
                <div class="next_btn bb d-f a-c j-c" onclick="move('right')"></div>

            </div>
        </div>
    </div>
</div>
<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <div class="d-f f-w">
            <?php
            $now = date('Y-m-d');
            $pre = date('Y-m-d',strtotime('-3 days'));
            $num = $Movie->math('COUNT','id'," WHERE `sh` = 1 AND `date` BETWEEN '$pre' AND '$now' ORDER BY `rank` ");
            $limit = 4;
            $pages = ceil($num/$limit);
            $page = ($_GET['page'])??1;
            if($page <= 0 || $page > $pages){
                $page = 1;
            }
            $start = ($page-1)*$limit;
            $limitSql = " Limit $start,$limit";
            $movies = $Movie->all(" WHERE `sh` = 1 AND `date` BETWEEN '$pre' AND '$now' ORDER BY `rank` ".$limitSql);
            foreach ($movies as $key => $movie) {
                switch ($movie['type']) {
                    case 1:
                    $movietype = '普遍級';
                    break;
                    case 2:
                    $movietype = '保護級';
                    break;
                    case 3:
                    $movietype = '輔導級';
                    break;
                    case 4:
                    $movietype = '限制級';
                    break;
                    
                }
            ?>
            <div class="w-50 d-f f-w" style="height: 150px; font-size:14px;">
                <div class="w-30">
                    <img src="./upload/<?=$movie['img']?>" alt="" style="width: 100%;">
                </div>
                <div class="w-70">
                    <div><?=$movie['name']?></div>
                    <div>
                        分級:<img src="./icon/03C0<?=$movie['type']?>.png" alt="" style="width: 20px;"><?=$movietype ?>
                    </div>
                    <div>上映日期:<?=$movie['date']?></div>
                </div>
                <div>
                    <input type="button" value="劇情簡介" onclick="location.href='?do=intro&id=<?=$movie['id']?>'">
                    <input type="button" value="線上訂票" onclick="location.href='?do=order&id=<?=$movie['id']?>'">
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="ct page">
            <?php
            if($page > 1){
            ?>
            <a href="?page=<?=$page-1?>">&lt;</a>
            <?php
            }
            for($i = 1 ; $i <= $pages ; $i++){
            ?>
            <a href="?page=<?=$i?>" class="<?=($page == $i)?'nowPage':''?>"><?=$i?></a>
            <?php
            }
            if($page < $pages){
            ?>
            <a href="?page=<?=$page+1?>">&gt;</a>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<script>
    $('.poster_item').eq(0).show();


    let posterAni = setInterval(()=>{ani()},2000);

    function ani(num){
        let now = $('.poster_item:visible');
        
        
        let next;

        if(num == undefined){
            if($(now).next().length == 0){
                
                next = $('.poster_item').eq(0);
            }else{
                next = $(now).next();
            }

        }else{
            next = $('.poster_item').eq(num);
        }
        
        
        let ani = $(next).data('ani');
        // console.log(next);
        switch (parseInt(ani)) {
            case 1:
                $(next).fadeIn(1500);
                $(now).fadeOut(1500);
            break;
                    
            case 2: 
                $(next).slideDown(1500);
                $(now).slideUp(1500);

            break;

            case 3:
                $(next).show(1500);
                $(now).hide(1500);
            break;
            
        }


    }

    $('.img_item').hover(function(){
        clearInterval(posterAni);
    },function(){
        posterAni = setInterval(()=>{ani()},2000);
    })


    let page = 0;
    
    function move(type){
        let items = <?=count($rows);?>;
        let limit = 4;
        let pages = parseInt(items)-parseInt(limit);
        var move;

        // console.log('page',page);
        // console.log('pages',pages);

        let nowRight = $('.controls_img').css('right').split('px')[0];
        let nowLeft = $('.controls_img').css('left').split('px')[0];
        

        switch (type) {
            case 'left':
            
            if(page >= 0 && page < pages){
                page++     
                move = parseInt(nowLeft)-82;
            }
                break;
            
            case 'right':

            if(page <= pages && page >= 1){
                page--;
                move = parseInt(nowLeft)+82;
            }    
                break;
        

        }

        // console.log('move',move);


        $('.controls_img').animate({left:move});
        
    }

    function changeAni(eq){
        ani(eq);
    }
</script>