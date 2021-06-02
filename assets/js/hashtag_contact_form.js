(function ($) {
    $(document).ready(() => {
        let formData = document.querySelector('.hashtag-contactform');
        $(formData).submit((e) => {
            e.preventDefault();
            let data = new FormData(formData);
            var btn = formData.querySelector(".submit");
            btn.setAttribute("disabled", "disabled")

            let btnParent = formData.querySelector("input[type='submit']").parentElement;
            let process = document.createElement("cs-loader");
            process.classList.add('loader-sm');
            btnParent.appendChild(process);

            // data.append("nonce",myAjax.nonce);
            checkGoogleRecaptcha(myAjax.google_site_key).then((cap_token) => {
                if (cap_token !== null) {
                    data["recaptcha_token"] = cap_token;
                }
                $.post({
                    url: myAjax.ajaxurl,
                    processData: false,
                    contentType: false,
                    data
                }).then((res) => {

                    let fieldErrors = res.data.errors;
                    if (fieldErrors !== undefined && fieldErrors !== null) {
                        for (let [key, val] of Object.entries(fieldErrors)) {
                            let elem = formData.querySelector('.' + key);
                            let errMsg = elem.querySelector('error-list');
                            errMsg.setAttribute('errors', JSON.stringify(val));
                        }
                    }

                    let send_status = "";
                    let success_class = res.success ? 'bg-blue-400' : 'bg-red-400';
                    let data = res.data.msg;
                    send_status = `<div class='notification closeable text-white my-5 py-4 px-3 ${success_class}'>${data}</div>`

                    $(formData).find(".contact-message")
                        .css('display', 'block')
                        .html(send_status)
                        .delay(6000)
                        .fadeOut(300);

                    btn.removeAttribute("disabled");

                    btnParent.removeChild(process);
                    if (res.success === true) {
                        let errMsg = formData.querySelectorAll('error-list');
                        errMsg.forEach((item) => {
                            item.setAttribute('errors', JSON.stringify([]));
                        });


                        formData.reset();
                    }
                }).catch((error) => {
                    btn.removeAttribute("disabled");
                    btnParent.removeChild(process);
                    console.log(error);
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