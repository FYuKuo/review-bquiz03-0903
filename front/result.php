<?php
$data = $Order->find(['no'=>$_GET['no']]);
$sets = unserialize($data['set']);
?>
<table class="table_bg order_table w-60 m-auto">
    <tr>
        <td colspan="2">
            感謝您的訂購，您的訂單編號是：<?=$data['no']?>
        </td>
    </tr>
    <tr>
        <td class="w-20">
            電影：
        </td>
        <td>
            <?=$Movie->find($data['movie'])['name']?>
        </td>
    </tr>
    <tr>
        <td>
            日期：
        </td>
        <td>
            <?=$data['date']?>
        </td>
    </tr>
    <tr>
        <td>
            場次時間：
        </td>
        <td>
            <?=$data['session']?>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            座位：
            <?php
            sort($sets);
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
    </tr>
    <tr>
        <td colspan="2" class="ct">
           <input type="button" value="確定" onclick="location.href='./index.php'">
        </td>
    </tr>
</table>