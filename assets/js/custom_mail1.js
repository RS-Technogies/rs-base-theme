(function ($) {
    $(document).ready(() => {
        $("#contact-form").submit((e) => {
            e.preventDefault();

            let name = $("#name").val();
            let email = $("#email").val();
            let subject = $("#subject").val();
            let comments = $("#comments").val();
            let phone = $("#phone").val();
            let data = {
                type: "post",
                dataType: "json",
                action: "custom_form_submit",
                nonce: myAjax.nonce,
                name: name,
                email: email,
                phone: phone,
                subject: subject,
                comments: comments,

            };

            checkGoogleRecaptcha(myAjax.google_site_key).then((cap_token) => {
                if (cap_token !== null) {
                    data["recaptcha_token"] = cap_token;
                }
                $.post({
                    url: myAjax.ajaxurl,
                    data
                }).then((res) => {
                    let send_status = "";
                    let success_class = res.success ? 'bg-blue-400' : 'bg-red-400';
                    let data = res.success ? res.data.msg : res.data.error;

                    send_status = `<div class='notification closeable text-white my-5 py-4 px-3 ${success_class}'>${data}</div>`

                    $("#contact-message")
                        .css('display', 'block')
                        .html(send_status)
                        .delay(6000)
                        .fadeOut(300);

                    document.getElementsByName('contact_form')[0].reset();
                });
            });

            return false;

        });
    });
})(jQuery);

function checkGoogleRecaptcha(google_key, func) {
    return new Promise((resolve, reject) => {
        // console.log(window.grecaptcha);
        if (window.grecaptcha === undefined) {
            resolve(null);
        }
        console.log(google_key);
        grecaptcha.ready(() => {
            grecaptcha.execute(google_key, {action: 'submit'})
                .then((cap_token) => {
                    resolve(cap_token)
                });
        });
    });
}