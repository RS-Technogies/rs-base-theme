
<a href="#" class="mb-2" id="add_offer" style="text-decoration:none;">
    <span class="dashicons dashicons-plus-alt"></span> Add New Offer
</a>
<div id="offer-block" class="flex flex-wrap my-2">
    <input type="hidden" name="is_offer_page" value="true" />

    <?php if (!empty($offer_arr)) :
        foreach ($offer_arr as $offer) :
    ?>
            <div class="offer-item w-1/3 my-3">
                <div class="mx-2">
                    <div class="bg-gray-100 shadow-md p-2">
                        <div class="mb-2 text-right">
                            <span class="dashicons dashicons-dismiss remove-offer text-red-500"></span>
                        </div>

                        <div class="mb-2">
                            <input class="w-full" type="text" name="offer_title[]" value="<?php echo esc_textarea($offer["title"]) ?>" placeholder="Title" />
                        </div>
                        <div class="mb-2">
                            <input class="w-full" type="text" name="offer_iconClass[]" value="<?php echo esc_textarea(isset($offer['iconClass']) ? $offer['iconClass'] : '') ?>" placeholder="icon class" />
                        </div>

                        <div class="mb-2">

                            <?php
                            $imgUrl = isset($offer["icon"]) ? $offer["icon"] : "";
                            ?>
                            <input type="hidden" class="paig-img-url" name="offer_image_icon[]" value="<?php echo $imgUrl; ?>" />
                            <?php
                            $btn_text = "Upload Image";
                            $img_class = "hidden";
                            if (!empty($offer["icon"])) {
                                $btn_text = "Edit Image";
                                $img_class = "";
                            }
                            ?>
                            <img class="offer_img <?php echo $img_class ?>" src="<?php echo esc_url($offer["icon"]) ?>" width="100%" height="200px" style="object-fit:cover;" />
                            <button class="wk-offer-button w-full py-2"><?php echo $btn_text ?></button>
                        </div>
                        <div class="mb-2">
                            <textarea class="w-full p-3" name="offer_content[]" rows="5" placeholder="Short Description"><?php echo isset($offer['content'])?esc_textarea($offer["content"]):""; ?> </textarea>
                        </div>
                        <div class="mb-2">
                            <input class="w-full" type="text" name="offer_url[]" value="<?php echo esc_html(isset($offer['url']) ? $offer['url'] : '') ?>" placeholder="URL" />
                        </div>
                    </div>

                </div>
            </div>
    <?php endforeach;
    endif; ?>



</div>