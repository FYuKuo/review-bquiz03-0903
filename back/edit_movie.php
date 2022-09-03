<?php
$data = $Movie->find($_GET['id']);
$year = explode('-',$data['date'])[0];
$month = explode('-',$data['date'])[1];
$day = explode('-',$data['date'])[2];
?>
<div class="table_bg w-80 m-auto">
    <div class="rb ct mytitle">
        修改電影資料
    </div>

    <form action="./api/edit_movie.php" method="post" enctype="multipart/form-data">
        <div class="d-f">
            <div class="w-20">
                影片資料
            </div>
            <div class="tr_bg w-80">
                <table class="w-100">
                    <tr>
                        <td>
                            片名:
                        </td>
                        <td>
                            <input type="text" name="name" id="name" style="width: 95%;" value="<?=$data['name']?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            分級:
                        </td>
                        <td>
                            <select name="type" id="type">
                                <option value="1" <?=($data['type'] == 1)?'selected':''?>>普遍級</option>
                                <option value="2" <?=($data['type'] == 2)?'selected':''?>>保護級</option>
                                <option value="3" <?=($data['type'] == 3)?'selected':''?>>輔導級</option>
                                <option value="4" <?=($data['type'] == 4)?'selected':''?>>限制級</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            片長:
                        </td>
                        <td>
                            <input type="text" name="time" id="time" style="width: 95%;" value="<?=$data['time']?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            上映時間:
                        </td>
                        <td>
                            <select name="year" id="year">
                                <option value="2022" <?=($year == 2022)?'selected':''?>>2022</option>
                                <option value="2023" <?=($year == 2023)?'selected':''?>>2023</option>
                            </select>
                            年
                            <select name="month" id="month">
                                <?php
                            for ($i=1; $i <= 12 ; $i++) { 
                            ?>
                                <option value="<?=$i?>" <?=($month == $i)?'selected':''?>><?=$i?></option>
                                <?php
                            }
                            ?>
                            </select>
                            月
                            <select name="day" id="day">
                                <?php
                            for ($i=1; $i <= 31 ; $i++) { 
                            ?>
                                <option value="<?=$i?>" <?=($day == $i)?'selected':''?>><?=$i?></option>
                                <?php
                            }
                            ?>
                            </select>
                            日
                        </td>
                    </tr>
                    <tr>
                        <td>
                            發行商:
                        </td>
                        <td>
                            <input type="text" name="pub" id="pub" style="width: 95%;" value="<?=$data['pub']?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            導演:
                        </td>
                        <td>
                            <input type="text" name="director" id="director" style="width: 95%;" value="<?=$data['director']?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            預告片影片:
                        </td>
                        <td>
                            <input type="file" name="movie" id="movie"><div style="color: red;font-size:12px;">檔案請使用英文檔名</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            電影海報:
                        </td>
                        <td>
                            <input type="file" name="img" id="img"><div style="color: red;font-size:12px;">檔案請使用英文檔名</div>
                        </td>
                    </tr>
                </table>


            </div>
        </div>
        <div class="d-f">
            <div class="w-20">
                劇情簡介
            </div>
            <div class="w-80">
                <textarea name="intro" id="intro"  style="width: 95%;"><?=$data['intro']?></textarea>
            </div>
        </div>
        <hr>
        <div class="ct">
            <input type="hidden" name="id" value="<?=$data['id']?>">
            <input type="submit" value="修改">
            <input type="reset" value="重置">
        </div>
    </form>
</div>