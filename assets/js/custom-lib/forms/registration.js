import FormRegistration from './admin/registration';
import {form_rules} from "../../config/auth/registration";

let registration_step = new FormRegistration(".registration");
let validation = $("#formValidate");

let form_url = {
    "b2b": '/backend/user/insert/b2b_partner',
    "associate": '/backend/user/insert/associate',
    "investor": '/backend/user/insert/investor'
};
window.googleMapsClient = null;

registration_step.on("init", (form) => {
    // let address_autocomplete = document.querySelector("#autocomplete");
    //
    // let autocomplete = new google.maps.places.Autocomplete(address_autocomplete, {
    //     types: ['geocode']
    // });
    //
    // google.maps.event.addListener(autocomplete, 'place_changed', function () {
    //     let place = autocomplete.getPlace();
    //     console.log(place);
    // });
}).on("next", (step, form) => {
    let role = form.dataset.role;
    validation.rules("add", form_rules[role][step]);
    validation.validate({
        errorElement: 'div',
        errorPlacement: function (error, element) {
            let placement = $(element).data('error');
            if (placement) {
                $(placement).append(error);
            } else {
                error.insertAfter(element);
            }
        },
        messages: {
            email: {
                remote: jQuery.validator.format("{0} is already registered")
            }
        },
    });
    registration_step.setValid(validation.valid());
}).on("submit", (form) => {
    let role = form.dataset.role;
    if (form_url.hasOwnProperty(role)) {
        form.action = form_url[role];
        form.submit();
    }
});


function showFileName(element){
    element.nextElementSibling.textContent=(element.files[0].name);
}

//handle file input label
let inputs=document.querySelectorAll(".custom-file input");
if(inputs){
    inputs.forEach((input)=>{
        input.addEventListener("change",(e)=>{
            showFileName(input);
        });
    });
}

