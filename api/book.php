<?php
include('./base.php');
$orders = $Order->all(['movie'=>$_GET['movie'],'session'=>$_GET['session'],'date'=>$_GET['date']]);
$set = [];
foreach ($orders as $key => $order) {
    $order['set'] = unserialize($order['set']);
    $set = array_merge($set,$order['set']);
}
?>
<div class="d-f book_set_bg m-auto f-w">
    <div class="book_set d-f m-auto f-w">
        <?php
    for($i=0 ; $i<20 ; $i++) {
        if(in_array($i,$set)){
        ?>
        <div class="set_item d-f f-w emptySet">
            <div class="ct w-100">
                <?=floor($i/5)+1?>排<?=floor($i%5)+1?>號
            </div>
        </div>
        <?php
        }else{
    ?>
        <div class="set_item d-f f-w">
            <div class="ct w-100">
                <?=floor($i/5)+1?>排<?=floor($i%5)+1?>號
            </div>
            <input type="checkbox" name="set" class="set" value="<?=$i?>" style="align-self: end;">
        </div>
        <?php
        }
    }
    ?>

    </div>
</div>

<div class="table_bg ct w-50 m-auto">
    <?php
    $movie = $Movie->find($_GET['movie'])
    ?>
    <div>您選擇的電影是：<?=$movie['name']?></div>
    <div>您選擇的時刻是：<?=$_GET['date']?> <?=$_GET['session']?></div>
    <div>您已勾選<span class="setnum"> 0 </span>張票，最多可購買四張票</div>
    <div class="ct">
        <input type="button" value="上一步" onclick="$('.movie_order_list,.book').toggle();$('.book').html('')">
        <input type="button" value="訂購" onclick="checkout()">
    </div>
</div>


<script>
    function checkout(){
        console.log(setArr);

        let movie = <?=$_GET['movie'];?>;
        let date = '<?=$_GET['date'];?>';
        let session = '<?=$_GET['session'];?>';
        let qt = setArr.length;

        $.post('./api/add_order.php',{movie,date,session,set:setArr,qt},(no)=>{
            location.href=`?do=result&no=${no}`;
        })
    }
</script>