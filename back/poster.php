<div class="table_bg">

    <div class="ct rb mytitle">預告片清單</div>
    <table class="m-auto w-100 ct my-10">
        <tr class="tr_bg">
            <td style="width: 25%;">預告片海報</td>
            <td style="width: 25%;">預告片片名</td>
            <td style="width: 25%;">預告片順序</td>
            <td style="width: 25%;">操作</td>
        </tr>
    </table>
    <form action="./api/edit_poster.php" method="post">
        <div class="m-auto w-100 ct my-10 list_group">


            <?php
            $rows = $Poster->all();

            foreach ($rows as $key => $row) {
            ?>
            <div class="list_bg d-f a-c">
                <div style="width: 25%;">
                    <img src="./upload/<?=$row['img']?>" alt="" style="height: 70px;">
                </div>
                <div style="width: 25%;">
                    <input type="text" name="name[]" id="name" value="<?=$row['name']?>">
                </div>
                <div style="width: 25%;">
                    <input type="button" value="往上">
                    <input type="button" value="往下">
                </div>
                <div style="width: 25%;">
                <input type="hidden" name="id[]" value="<?=$row['id']?>">
                <input type="checkbox" name="sh[]" id="sh" value="<?=$row['id']?>" <?=($row['sh'] == 1)?'checked':''?>>顯示
                <input type="checkbox" name="del[]" id="del" value="<?=$row['id']?>">刪除
                <select name="ani[]" id="ani">
                    <option value="1" <?=($row['ani'] == 1)?'selected':''?>>淡入淡出</option>
                    <option value="2" <?=($row['ani'] == 2)?'selected':''?>>滑入滑出</option>
                    <option value="3" <?=($row['ani'] == 3)?'selected':''?>>縮放</option>
                </select>
                </div>
            </div>
            <?php
            }
            ?>

        </div>
        <div class="ct">

            <input type="submit" value="編輯確定">
            <input type="reset" value="重置">
        </div>
    </form>
</div>
<hr>

<div class="table_bg">
    <div class="ct rb mytitle">新增預告片海報</div>
    <form action="./api/add_poster.php" method="post" enctype="multipart/form-data">
        <table class="m-auto w-100 ct my-10">
            <tr>
                <td>
                    預告片海報:
                    <input type="file" name="img" id="img">
                </td>
                <td>
                    預告片片名:
                    <input type="text" name="name" id="name">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="新增">
                    <input type="reset" value="重置">
                </td>
            </tr>
        </table>
    </form>

</div>