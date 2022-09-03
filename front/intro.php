<?php
$data = $Movie->find($_GET['id']);
    switch ($data['type']) {
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
<div class="tab rb" style="width:87%;">
    <div style="background:#FFF; width:100%; color:#333; text-align:left">

        <video src="./upload/<?=$data['movie']?>" width="300px" height="250px" controls="" style="float:right;"></video>

        <font style="font-size:24px"> 

        <img src="./upload/<?=$data['img']?>" width="200px" height="250px" style="margin:10px; float:left">

            <p style="margin:3px">影片名稱 ：<?=$data['name']?>
                <input type="button" value="線上訂票" onclick="location.href='?do=order&id=<?=$data['id']?>'" style="margin-left:50px; padding:2px 4px" class="b2_btu">
            </p>

            <p style="margin:3px">影片分級 ： <img src="./icon/03C0<?=$data['type']?>.png" style="display:inline-block;"><?=$movietype?> </p>
            <p style="margin:3px">影片片長 ： <?=$data['time']?></p>
            <p style="margin:3px">上映日期 <?=$data['date']?></p>
            <p style="margin:3px">發行商 ： <?=$data['pub']?></p>
            <p style="margin:3px">導演 ： <?=$data['director']?></p>

            <br>
            <br>

            <p style="margin:10px 3px 3px 3px; word-break:break-all"> 劇情簡介：<br>
            <?=$data['intro']?>
            </p>
        </font>

        <table width="100%">
            <tbody>
                <tr>
                    <td class="ct"><input type="button" value="院線片清單" onclick="location.href='./index.php'"></td>
                </tr>
            </tbody>
        </table>

    </div>
</div>