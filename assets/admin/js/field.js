(function ($) {
    var wkMedia, btnContext;
    $(document).ready(() => {
        $("#services-block").sortable({
            revert: true
        });
        //add new service block
        $("#add_services").click((e) => {
            e.preventDefault();
            let last_index = ("#services-block").lastIndexOf();
            console.log(last_index);
            add_new_item('service');

        });
        // btnContext=;
        $(document).on("click", '.wk-button', function (e) {
            e.preventDefault();
            // console.log("ok");
            btnContext = $(this);
            if (wkMedia) {
                wkMedia.open();
                return;
            }
            wkMedia = view_media_files();
            wkMedia.on("select", select_media_file_service);
            wkMedia.open();
        });

        $(document).on("click", '.remove-service', function (e) {
            e.preventDefault();
            let parent = $(this).closest(".service-item");
            $(parent).remove();
        });

        // code for offer goes here

        $("#offer-block").sortable({
            revert: true
        });

        //add new offer
        $("#add_offer").click((e) => {
            e.preventDefault();
            add_new_item('offer');
        });

        $(document).on("click", '.remove-offer', function (e) {
            e.preventDefault();
            let parent = $(this).closest(".offer-item");
            $(parent).remove();
        });

        // btnContext=;
        $(document).on("click", '.wk-offer-button', function (e) {
            e.preventDefault();
            // console.log("ok");
            btnContext = $(this);
            if (wkMedia) {
                wkMedia.open();
                return;
            }
            wkMedia = view_media_files();
            wkMedia.on("select", select_media_file_offer);
            wkMedia.open();
        });

    });

    function add_new_item(prefixClass) {
        let html = '<div class="' + prefixClass + '-item w-1/3"> ';
        html += '<div class="mx-2">';
        html += ' <div class="bg-gray-100 shadow-md p-2">';
        html += '<div class="shadow p-2">';
        html += '<div class="mb-2 text-right">';
        html += '<span class="dashicons dashicons-dismiss remove-' + prefixClass + ' text-red-500"></span>';
        html += '</div>';
        html += '<div class="mb-2">';
        html += '<input class="w-full" type="text" name="' + prefixClass + '_title[]" value="" placeholder="Title" />';
        html += '</div>';
        html += '<div class="mb-2">';
        html += '<input class="w-full" type="text" name="' + prefixClass + '_iconClass[]" value="" placeholder="Icon Class"/>';
        html += '</div>';
        html += '<div class="mb-2">';
        html += '<input type="hidden" class="paig-img-url" name="' + prefixClass + '_image_icon[]" />';
        html += '<img class="' + prefixClass + '_img hidden" src="" width="100%" height="200px" style="object-fit:cover;" />';
        html += '<button class="wk-button w-full py-2">Upload Image</button>';
        html += "</div>";
        html += '<div class="mb-2">';
        html += '<textarea class="w-full" name="' + prefixClass + '_content[]" value="" rows="5" placeholder="Short Description"></textarea>';
        html += "</div>";
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

        if (prefixClass == 'service') {
            $("#services-block").append(html);
        } else if (prefixClass == 'offer') {
            $("#offer-block").append(html);
        }
    }

    function view_media_files() {
        return wp.media.frames.file_frame = wp.media({
            title: 'Select media',
            button: {
                text: 'Select media'
            },
            multiple: false
        });
    }

    //select media file why choose us
    function select_media_file_service() {
        var attachment = wkMedia.state().get('selection').first().toJSON();
        // console.log(btnContext);
        let btnParent = btnContext.parent();
        //Add Hidden URL to save
        $(btnParent).find(".paig-img-url").val(attachment.url);
        //display image in the service div
        let service_img = $(btnParent).find(".service_img");
        service_img.attr("src", attachment.url);
        //remove hidden for add service
        service_img.removeClass("hidden");
        //Add Edit text
        $(btnContext).html("Edit Image");
    }


    //select media file what we offer
    function select_media_file_offer() {
        var attachment = wkMedia.state().get('selection').first().toJSON();
        // console.log(btnContext);
        let btnParent = btnContext.parent();
        //Add Hidden URL to save
        $(btnParent).find(".paig-img-url").val(attachment.url);
        //display image in the service div
        let offer_img = $(btnParent).find(".offer_img");
        offer_img.attr("src", attachment.url);
        //remove hidden for add service
        offer_img.removeClass("hidden");
        //Add Edit text
        $(btnContext).html("Edit Image");
    }




})(jQuery);