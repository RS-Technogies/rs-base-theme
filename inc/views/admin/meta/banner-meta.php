<?php
    $btn_text="Upload Background Image";
?>
<div class="banner-item w-2/3 my-3">
    <div class="mx-2">
        <div class="bg-gray-100 shadow-md p-2">
            <div class="mb-2">
                <input class="w-full" type="text" name="<?php echo $meta_id ?>_text"
                       value="<?php echo esc_textarea($banner_text) ?>" placeholder="Title"/>
            </div>

            <div class="mb-2">
                <input class="w-full" type="text" name="<?php echo $meta_id ?>_btn_text"
                       value="<?php echo esc_textarea($banner_btn_text) ?>" placeholder="Button Text"/>
            </div>

            <div class="mb-2">
                <?php
                    if(empty($banner_image)){
                        $img_class = "hidden";
                    }
                ?>
                <img class="offer_img <?php echo isset($img_class)?$img_class:'' ?>" src="<?php echo esc_url($banner_image) ?>" width="100%"
                     height="150px" style="object-fit:cover;max-height:150px;overflow:hidden;object-position:center"/>
                <input type="hidden" class="paig-img-url" name="<?php echo $meta_id ?>_image" value="<?php echo $banner_image; ?>" />
                <button class="wk-offer-button w-full py-2"><?php echo $btn_text ?></button>

            </div>
            <div class="mb-2">
                <input type="text" class="w-full" name="<?php echo $meta_id ?>_url" rows="5" placeholder="URL"
                       value="<?php echo esc_textarea($banner_url); ?>"/>
            </div>
        </div>
    </div>
</div>

