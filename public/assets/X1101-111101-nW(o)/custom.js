function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test($email);
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': csrftoken
    }
});



/* INITIALIZE PHONE INPUTS WITH THE intlTelInput FEATURE*/
//  let input = document.querySelector("#field_phone");

//  let iti = intlTelInput(input);

//  $(window).on("load", function() {

//      intlTelInputGlobals.loadUtils("https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/15.0.2/js/utils.js");

//      intlTelInput(input, {
//          initialCountry: "ae",
//          separateDialCode: true,
//          nationalMode: false,
//      });

//      let countryData = window.intlTelInputGlobals.getCountryData();

//      console.log(countryData);


//  });

/* ADD A PATTERN MASK IN PHONE INPUT AND REMOVE PREVIOUS VALUE - ON COUNTRY CHANGE */
$("#field_phone").on('focus', function(e, countryData) {

    $("#field_phone").val("").trigger("input");

    let placeholder = $("#field_phone").attr("placeholder");

    let pattern = placeholder.replace(/-/g, " ");
    let phoneNumber = pattern.replace(/\d/gi, "0");





});


$("#field_phone").focusout(function(e, countryData) {

    let phone_number = $("#field_phone").val();
    phone_number = iti.getNumber(intlTelInputUtils.numberFormat.E164);

    console.log(phone_number);
});

$(".toggle-password").click(function() {
    $(this).toggleClass("fa-eye fa-eye-slash");

    var input = $($(this).attr("toggle"));

    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

$('button#email-verify').prop('disabled', true);

$("input#field_email").keyup(function() {
    var email = $(this).val();
    if (email == '') { $('button#email-verify').prop('disabled', true); }
    if (!validateEmail(email)) {
        $("span#emailerror").html("<small class='text-danger'>Email is not valid</small>");
        $('button#email-verify').prop('disabled', true);
        return false;
    } else {
        $('button#email-verify').prop('disabled', false);
        $("span#emailerror").empty();
    }
});

$('button#email-verify').click(function() {
    var email = $("input#field_email").val();
    if (email == '') {
        $("span#emailerror").html("<small class='text-danger'>Write your email</small>");
        return false;
    }
    if (!validateEmail(email)) {
        $("span#emailerror").html("<small class='text-danger'>Email is not valid</small>");
        return false;
    } else {
        $("span#emailerror").empty();
        $("span#emailerror").text('loading...');
    }



    $.ajax({
        url: baseurl + "/createuser",
        type: 'POST',
        dataType: "json",
        data: {
            email: email
        },
        success: function(data) {
            if (data.success == 'success') {
                $("input#field_email").prop('disabled', true);
                $('button#email-verify').prop('disabled', true);
                $('input#step1-c').prop('disabled', false);
                $("span#emailerror").html('<small class="text-success">Verification email has been sent, check your inbox</small>');
            } else {
                $("span#emailerror").html('<small class="text-danger">' + data.error + '</small>');
            }
        }
    });
});

$("input#step1-c").click(function() {
    $("span#captchaerror").empty();
    $("span#emailerror").empty();
    var captcha = $("input#captcha").val();
    if (captcha == '') {
        $("span#captchaerror").html('<small class="text-danger">Captcha can not be empty </small>');
        return false;
    }

    $.ajax({
        url: baseurl + '/verifycaptcha',
        type: 'POST',
        dataType: "json",
        data: {
            captcha: captcha
        },
        success: function(data) {
            if (data.success == 'success') {
                $("div#step-1").css('display', 'none');
                $("div#step-2").css('display', 'block');
            } else if (data.error == 'email_verify') {
                $("span#emailerror").html('<small class="text-danger">First verify your email</small>');
            } else if (data.error == 'captcha') {
                $("span#captchaerror").html('<small class="text-danger">Captcha is wrong </small>');
            }
        }
    });
});

$('i#reloadcaptcha').click(function() {

    $.ajax({
        url: baseurl + "/reloadcaptcha",
        type: 'POST',
        dataType: "json",
        success: function(data) {
            $("span#captcha").text(data);
        }
    });

});

$("select#country").on('change', function() {
    var countryid = $("select#country").select2('val');
    $.ajax({
        url: baseurl + "/findcitiesbycountry",
        type: 'POST',
        dataType: "json",
        data: {
            countryid: countryid
        },
        success: function(data) {
            $('select#city').find('option:not(:first)').remove();
            $.each(data, function() {
                $('<option/>', {
                    'value': this.id,
                    'text': this.name
                }).appendTo('select#city');
            });
        }
    });

});

tab = $('.tabs h3 a');

tab.on('click', function(event) {
    event.preventDefault();
    tab.removeClass('active');
    $(this).addClass('active');

    tab_content = $(this).attr('href');
    $('div[id$="tab-content"]').removeClass('active');
    $(tab_content).addClass('active');
});


$("input#submitlogin").click(function() {
    var email = $("input#email").val();
    if (email == '') {
        $("span#emailerror").html("<small class='text-danger'>Email is required</small>");
        return false;
    }
    if (!validateEmail(email)) {
        $("span#emailerror").html("<small class='text-danger'>Email is not valid</small>");
        return false;
    } else {
        $("span#emailerror").empty();
    }
});


//reset email functionalities =============
$('button#reset_email').prop('disabled', true);
$("input#field_email").keyup(function() {
    var email = $(this).val();
    if (email == '') { $('button#reset_email').prop('disabled', true); }
    if (!validateEmail(email)) {
        $("span#emailerror").html("<small class='text-danger'>Email is not valid</small>");
        $('button#reset_email').prop('disabled', true);
        return false;
    } else {
        $('button#reset_email').prop('disabled', false);
        $("span#emailerror").empty();
    }
});

$('button#reset_email').click(function() {
    var email = $("input#field_email").val();
    if (email == '') {
        $("span#emailerror").html("<small class='text-danger'>Write your email</small>");
        return false;
    }
    if (!validateEmail(email)) {
        $("span#emailerror").html("<small class='text-danger'>Email is not valid</small>");
        return false;
    } else {
        $("span#emailerror").empty();
        $("span#emailerror").text('loading...');
    }

    $.ajax({
        url: baseurl + "/resetemail",
        type: 'POST',
        dataType: "json",
        data: {
            email: email
        },
        success: function(data) {
            console.log(data.success);
            if (data.success == 'success') {
                $("span#emailerror").html('<small class="text-success">Reset link has been sent to your email, check your inbox</small>');
            } else {
                $("span#emailerror").html('<small class="text-danger">' + data.error + '</small>');
            }
        }
    });
});
// ============================ end