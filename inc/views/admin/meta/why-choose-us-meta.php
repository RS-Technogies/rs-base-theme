
<a href="#" class="mb-2" id="add_services" style="text-decoration:none;">
    <span class="dashicons dashicons-plus-alt"></span> Add New Services
</a>

<div id="services-block" class="flex flex-wrap my-2"> 
    <input type="hidden" name="is_service_page" value="true" />
    <?php if(!empty($service_arr)): 
        foreach($service_arr as $service):
    ?>
        <div class="service-item w-1/3 my-3">
            <div class="mx-2">
                <div class="bg-gray-100 shadow-md p-2">
                    <div class="mb-2 text-right">
                        <span class="dashicons dashicons-dismiss remove-service text-red-500"></span>
                    </div>
                    <div class="mb-2">
                        <input class="w-full" type="text" name="service_title[]" 
                            value="<?php echo esc_textarea($service["title"]) ?>" placeholder="Title"/>
                    </div>
                    <div class="mb-2">
                        <input class="w-full" type="text" name="service_iconClass[]" 
                            value="<?php echo isset($service['iconClass'])?$service['iconClass']:""; ?>" placeholder="Icon Class"/>
                    </div>
                    <div class="mb-2">
                        <?php 
                        $imgUrl = isset($service["icon"])?$service["icon"]:"";
                        ?>
                        <input type="hidden" class="paig-img-url" name="service_image_icon[]" value="<?php echo  $imgUrl;  ?>"  />
                        <?php 
                            $btn_text="Upload Image";
                            $img_class="hidden";
                            if(!empty($service["icon"])){
                                $btn_text="Edit Image";
                                $img_class="";
                            }
                        ?>
                        <img class="service_img <?php echo $img_class ?>" src="<?php echo esc_url($service["icon"]) ?>" width="100%" height="200px" style="object-fit:cover;" />
                        <button class="wk-button w-full py-2"><?php echo $btn_text ?></button>
                        
                    </div>
                    <div class="mb-2">
                        <textarea class="w-full p-3" name="service_content[]" rows="5" placeholder="Short Description"><?php echo esc_textarea($service["content"]); ?></textarea>
                    </div>
                </div>
                
            </div>
        </div>
    <?php 
            endforeach;
        endif; ?>
</div>
