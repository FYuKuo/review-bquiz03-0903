<style>
    table tr:not(:last-child) {
        border-bottom: 1px solid black;
    }
</style>
<?php
$rows = $Order->all();
$movies = [];
foreach ($rows as $key => $row) {
if(!in_array($row['movie'],$movies)){
    $movies[] = $row['movie'];
}
}
sort($movies);
?>
<div class="table_bg">
    <div class="ct rb mytitle">訂票清單</div>
    <div class="p-10">
        快速刪除：
        <input type="radio" name="fastDel" class="fastDel" value="date" checked>依日期<input type="text" name="date" id="date" >
        <input type="radio" name="fastDel" class="fastDel" value="movie">依電影
        <select name="movie" id="movie">
            <?php
            foreach ($movies as $key => $movie) {
            ?>
            <option value="<?=$movie?>"><?=$Movie->find($movie)['name']?></option>
            <?php
            }
            ?>
        </select>
        <input type="button" value="刪除" onclick="del_order()">
    </div>
    <table class="w-100 ct">
        <tr style="background-color: #bbb">
            <td style="width: 14%;">訂單編號</td>
            <td style="width: 14%;">電影名稱</td>
            <td style="width: 14%;">日期</td>
            <td style="width: 14%;">場次時間</td>
            <td style="width: 14%;">訂購數量</td>
            <td style="width: 14%;">訂購位置</td>
            <td style="width: 14%;">操作</td>
        </tr>
    </table>
    <div class="order_list">
        <table class="w-100 ct b-c " >
            <?php
            foreach ($rows as $key => $row) {
                $sets = unserialize($row['set']);
                sort($sets);
            ?>
            <tr >
                <td style="width: 14%;"><?=$row['no']?></td>
                <td style="width: 14%;"><?=$Movie->find($row['movie'])['name']?></td>
                <td style="width: 14%;"><?=$row['date']?></td>
                <td style="width: 14%;"><?=$row['session']?></td>
                <td style="width: 14%;">
                    <?=$row['qt']?>
                </td>
                <td style="width: 14%;">
                    <?php
                foreach ($sets as $key => $set) {
                ?>
                    <div>
                        <?=floor($set/5)+1?>排
                        <?=floor($set%5)+1?>號
                    </div>
                    <?php
                }
                ?>
                </td>
                <td style="width: 14%;">
                    <input type="button" value="刪除" onclick="del(<?=$row['id']?>,'<?=$_GET['do']?>')">
                </td>
            </tr>
            <?php
            }
            ?>
        </table>

    </div>
</div>

<script>
    function del_order(){
        let type = $('.fastDel:checked').val();
        let val ;
        if(type == 'date'){
            val = $('#date').val();
        }else{
            val = $('#movie').val();
        }

        $.post('./api/del_order.php',{type,val},()=>{
            location.reload();
        })
    }
</script>