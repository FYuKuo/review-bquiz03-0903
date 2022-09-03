<div class="d-f book_set_bg m-auto f-w">
    <div class="book_set d-f m-auto f-w">
        <?php
    for($i=0 ; $i<20 ; $i++) {
    ?>
        <div class="set_item d-f f-w">
            <div class="ct w-100">
                <?=floor($i/5)+1?>排<?=floor($i%5)+1?>號
            </div>
            <input type="checkbox" name="set" class="set" value="<?=$i?>" style="align-self: end;">
        </div>
        <?php
    }
    ?>

    </div>
</div>