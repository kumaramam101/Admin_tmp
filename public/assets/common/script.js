_WEBROOT_ = window.location.origin;

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //====== Dropdown with search ======//
    $(function () {
        $("#country,#state,#city,#phonecode").select2();
    });
    $(".aliasObj").keyup(function () {
        var obj = $(this).val().toLowerCase().replace(/[^a-zA-Z0-9]+/g, "-");
        $(".aliasSub").val(obj);
    });
    $("#password").on("keydown", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            $("#login_user").click();
        }
    });

    // $("select").each(function() {
    //     var width = $(this).closest("span").css('width');
    //     if (width === '350.4px') {
    //       $(this).replaceWith('<span style="width: 100%">');
    //     }
    // });
    //====== End Dropdown with search ======//
    const checkPasswordValidity = t => {
        if (!t) return "Password field is required.";
        //let s = /^\S*$/;
        //if (!s.test(t)) return "Password must not contain Whitespaces.";
        let e = /^(?=.*[A-Z]).*$/;
        if (!e.test(t)) return "Password must have at least one Uppercase Character.";
        let a = /^(?=.*[a-z]).*$/;
        if (!a.test(t)) return "Password must have at least one Lowercase Character.";
        let o = /^(?=.*[~`!@#$%^&*()--+={}\[\]|\\:;"'<>,.?/_â‚¹]).*$/;
        if (!o.test(t)) return "Password must contain at least one Special Symbol.";
        let i = /^(?=.*[0-9]).*$/;
        if (!i.test(t)) return "Password must contain at least one Digit.";
        let r = /^.{8}$/;
        return r.test(t) ? null : "Password must be 8 Characters Long."
    };
    $(".valid_pass").on('input', function () {
        var pass = $("#pass").val();
        var r = checkPasswordValidity(pass);
        $("#pass_err").html(r);
    });
    $(".tooglePass").click(function () {
        $this = $(this);
        var passwordInput = $this.closest(".input-group").find("input[type]");
        var currentType = passwordInput.attr("type");
        if (currentType == "password") {
            passwordInput.attr("type", "text");
            $this.html('<i class="bi bi-eye-fill"></i>');
        } else {
            passwordInput.attr("type", "password");
            $this.html('<i class="bi bi-eye-slash"></i>');
        }
    });

    $(".add_user").click(function () {
        var user_type = $("#user_type").val();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        var valid_email = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var phone = $("#phone").val();
        var pass = $("#pass").val();
        var cnf_pass = $("#cnf_pass").val();
        if (!user_type) {
            $("#user_type").addClass('is-invalid');
            $("#user_type_err").html('Select a type of user.');
            return false;
        } else {
            $("#user_type").removeClass('is-invalid');
        }
        if (!fname) {
            $("#fname").addClass('is-invalid');
            $("#fname_err").html('Enter your first name.');
            return false;
        } else {
            $("#fname").removeClass('is-invalid');
        }
        if (!lname) {
            $("#lname").addClass('is-invalid');
            $("#lname_err").html('Enter your last name.');
            return false;
        } else {
            $("#lname").removeClass('is-invalid');
        }
        if (!email) {
            $("#email").addClass('is-invalid');
            $("#email_err").html('The email field is required.');
            return false;
        } else {
            if (!valid_email.test(email)) {
                $("#email").addClass('is-invalid');
                $("#email_err").html('Please enter a valid email address.');
                return false;
            } else {
                $("#email").removeClass('is-invalid');
            }
        }
        if (!phone) {
            $("#phone").addClass('is-invalid');
            $("#phone_err").html('Enter your phone number.');
            return false;
        } else {
            $("#phone").removeClass('is-invalid');
        }
        if (!pass) {
            $("#pass").addClass('is-invalid');
            $("#pass_err").html('Password field is required.');
            return false;
        } else {
            var r = checkPasswordValidity(pass);
            if (r) {
                $("#pass_err").html(r);
                $("#pass").addClass('is-invalid');
                return false;
            } else {
                $("#pass").removeClass('is-invalid');
            }
        }
        if (!cnf_pass) {
            $("#cnf_pass").addClass('is-invalid');
            $("#cnf_pass_err").html('Confirm Password field is required.');
            return false;
        } else {
            if (cnf_pass !== pass) {
                $("#cnf_pass").addClass('is-invalid');
                $("#cnf_pass_err").html('Password & Confirm Password should be match !!');
                return false;
            } else {
                $("#cnf_pass").removeClass('is-invalid');
            }
            $.ajax({
                type: "POST",
                url: _WEBROOT_ + "/admin_tmp/addUser",
                data: {
                    user_type: user_type,
                    fname: fname,
                    lname: lname,
                    email: email,
                    phone: phone,
                    pass: pass,
                },
                success: function (data) {
                    resp = JSON.parse(data);
                    err = resp.type;
                    if (resp.status == 1) {
                        _showtoastar(resp.massage, "bg-success", err);
                    } else {
                        $("#" + err).addClass("is-invalid");
                        _showtoastar(resp.massage, "bg-danger", err);
                    }
                    setTimeout(function () {
                        window.location.reload();
                    }, 8000);
                },
            });
        }
    });

    $("#login_user").click(function () {
        email = $("#email").val();
        pass = $("#password").val();
        var valid_email = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!email) {
            $("#email").addClass('is-invalid');
            $("#err_email").html('Please enter your email.');
            return false;
        } else {
            if (!valid_email.test(email)) {
                $("#email").addClass('is-invalid');
                $("#err_email").html('Please enter a valid email address.');
                return false;
            } else {
                $("#email").removeClass('is-invalid');
                $("#err_email").html('');
            }
        }
        if (!pass) {
            $("#password").addClass('is-invalid');
            $("#err_pass").html('Please enter your password!');
            return false;
        } else {
            $("#password").removeClass('is-invalid');
            $("#err_pass").html('');
            $.ajax({
                type: "POST",
                url: _WEBROOT_ + "/admin_tmp/login",
                data: {
                    email: email,
                    pass: pass,
                },
                success: function (data) {
                    resp = JSON.parse(data);
                    msg = resp.massage;
                    if (resp.status == 0) {
                        $("#email").addClass("is-invalid");
                        Toastify({
                            text: msg,
                            duration: 3000,
                            color: "red"
                        }).showToast();
                    } else {
                        $("#email").removeClass("is-invalid");
                    }
                    if (resp.status == 1) {
                        Toastify({
                            text: msg,
                            duration: 3000,
                            color: "green"
                        }).showToast();
                        window.location.href = "dashboard";
                    }
                    if (resp.status == 2) {
                        $("#password").addClass("is-invalid");
                        _showtoastar(msg, "bg-danger");
                    } else {
                        $("#password").removeClass("is-invalid");
                    }
                }
            });
        }

    });
});
//====== Add social media & remove ======//
$("#add_link").click(function () {
    var markup = '<div class="row col-12 m-0 p-0">' +
        '<div class="col-md-5 col-10 mb-2">' +
        '<label for="" class="col-form-label">Select Social Media Account</label>' +
        '<select class="form-select socailMedia">' +
        '<option selected="Facebook">Facebook</option>' +
        '<option value="instagram">Instagram</option>' +
        '<option value="twitter">Twitter</option>' +
        '<option value="linkedin">Linkedin</option>' +
        '<option value="youtube">Youtube</option>' +
        '</select>' +
        '</div>' +
        '<div class="col-md-5 col-10 mb-3">' +
        '<label for="" class="col-form-label">Add Social Media Link</label>' +
        '<input name="social_account_url" type="text" class="form-control" id="social_account_url">' +
        '</div>' +
        '<div class="col-2" style="padding-top: 38px;">' +
        '<button class="remove_link btn bg-primary text-white"><i class="bi bi-trash"></i></button>' +
        '</div>' +
        '</div>';
    $("#add_media").append(markup);
});
$(document).on("click", ".remove_link", function () {
    $(this).closest(".row").remove();
});
//====== End Add social media & remove ======//

$("#changePass").click(function () {
    var currentpass = $("#currentpass").val();
    if (!currentpass) {
        $(".new_pass_tab").addClass("d-none");
        $("#currentpass").addClass('is-invalid');
        $("#currentpass_err").html('Please enter your Current Password.');
        return false;
    } else {
        $.ajax({
            type: "POST",
            url: _WEBROOT_ + "/admin_tmp/profile",
            data: {
                currentpass: currentpass,
            },
            success: function (data) {
                resp = JSON.parse(data);
                if (resp.status == 1) {
                    $(".new_pass_tab").removeClass("d-none");
                    $("#currentpass").removeClass('is-invalid');
                    return false;
                } else {
                    $(".new_pass_tab").addClass("d-none");
                    $("#currentpass").addClass('is-invalid');
                    $("#currentpass_err").html('Your Password is Not Matched !!');
                }
            }
        });
    }
});

$("#country").on("change", function(){
    countryId = $("#country").val();
    $.ajax({
        type: "POST",
        url: _WEBROOT_ + "/admin_tmp/profile",
        data: {
            countryId: countryId,
        },
        success: function (data) { //console.log(data);
            resp = JSON.parse(data);
            $("#state").html(resp.states);
        }
    });
});
$("#state").on("change", function(){
    state_id = $("#state").val();
    $.ajax({
        type: "POST",
        url: _WEBROOT_ + "/admin_tmp/profile",
        data: {
            state_id: state_id,
        },
        success: function (data) { //console.log(data);
            resp = JSON.parse(data);
            $("#city").html(resp.cities);
        }
    });
});
$("#saveDetails").click(function () {
    fname = $("#fname").val();
    lname = $("#lname").val();
    gender = $("gender").val();
    phone = $("#phone").val();
    dob = $("#dob").val();
    bio = $("#bio").val();
    country = $("#country").val();
    state = $("#state").val();
    city = $("#city").val();
    pincode = $("#pincode").val();
    address = $("#address").val();
    social_account = $("#social_account").val();
    social_account_url = $("#social_account_url").val();
    var socailMedia = $(".socailMedia :selected").map(function (i, el) {
            return $(el).val();
        }).get();
    var mediaUrl = $("input[name='social_account_url']").map(function () {
        return $(this).val();
    }).get(); //console.log(mediaUrl);
    var form = $("#save_profile")[0];
    var all_details = new FormData(form);
    all_details.append("socailMedia", socailMedia);
    all_details.append("mediaUrl", mediaUrl);
    $.ajax({
        url: _WEBROOT_ + "/admin_tmp/profile",
        type: "POST",
        data: all_details,
        contentType: false,
        processData:false,
        cache: false,
        success: function(data){

        }
    });
});
// var profilePic = $("#profilePic").val();
// profilePic.onchange = evt => {
//     const [file] = profilePic.files
//     if (file) {
//       blah.src = URL.createObjectURL(file)
//     }
// }
$("#profilePic").change(function(evt) {
    const file = evt.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
        };
        reader.readAsDataURL(file);
    }
});

function validateInput(inputElement, errorElement, errorMessage) {
    const value = inputElement.val();
    if (!value) {
        inputElement.addClass("is-invalid");
        errorElement.html(errorMessage);
        return false;
    }
    inputElement.removeClass("is-invalid");
    errorElement.html("");
    return true;
}

$(document).ready(function() {
    $("#add_term").click(function() {
        const termName = $("#termName");
        const termAlias = $("#termAlias");
        const termStatus = $("#termStatus");

        if (
            !validateInput(termName, $("#termName_err"), "Enter the term name") ||
            !validateInput(termAlias, $("#termAlias_err"), "Enter the term alias")
        ) {
            return false;
        }

        $.ajax({
            type: "POST",
            url: _WEBROOT_ + "/admin_tmp/add-terms",
            data: {
                termName: termName.val(),
                termAlias: termAlias.val(),
                termStatus: termStatus.val(),
            },
            success: function (response) {
                // Handle the response here
            }
        });
    });
    $("#add_tool").click(function() {
        const hidden_id = $("#hidden_id");
        const tool_status = $("#tool_status");
        const toolTitle = $("#toolTitle");
        const toolAlias = $("#toolAlias");
        const toolHeading = $("#toolHeading");
        const toolSynopsis = $("#toolSynopsis");
        const tool_html = $("#tool_html");
        const tool_css = $("#tool_css");
        const tool_js = $("#tool_js");

        if (
            !validateInput(toolTitle, $("#toolTitle_err"), "Enter the tool title") ||
            !validateInput(toolAlias, $("#toolAlias_err"), "Enter the tool alias") ||
            !validateInput(toolHeading, $("#toolHeading_err"), "Enter the tool heading") ||
            !validateInput(toolSynopsis, $("#toolSynopsis_err"), "Enter the tool synopsis")
        ) {
            return false;
        }

        $.ajax({
            type: "POST",
            url: _WEBROOT_ + "/admin_tmp/add-tool",
            data: {
                hidden_id: hidden_id.val(),
                tool_status: tool_status.val(),
                toolTitle: toolTitle.val(),
                toolAlias: toolAlias.val(),
                toolHeading: toolHeading.val(),
                toolSynopsis: toolSynopsis.val(),
                tool_html: tool_html.val(),
                tool_css: tool_css.val(),
                tool_js: tool_js.val(),
            },
            success: function (response) {
                // Handle the response here
            }
        });
    });

});

$("#toolStatusBtn").click(function(){
    var new_status = $('input[name="toggle"]:checked').val();
    $.ajax({
        type: "POST",
        url: _WEBROOT_ + "/admin_tmp/add-tool",
        data: {
            new_status: new_status,
        },
        success: function (response) {
            // Handle the response here
        }
    });
});



// $.fn.show_err = function () {
//     var year = $("#fin_year_selt").val();
//     var regime = $("#pay_tax_selt").val();

//     if (year === "Select") {
//         $("#pay_tax_selt").val("Select");
//         $("#preven_chk_inp, #medi_amt_inp, #medi_exp_inp, #pre_helt_inp, #medi_insamu_inp, #medi_expamu_inp").val("");
//         $("#total_dedu_lab, #total_dedu_lab1, #total_eligi_lab").html("0");
//         _showtoastar("Financial Year left blank", "toast-warning", "Financial Year Error");
//         $("#fin_year_selt").addClass("is-invalid").removeClass("is-valid");
//         return false;
//     } else {
//         $("#fin_year_selt").removeClass("is-invalid").addClass("is-valid");
//     }

//     if (regime === "Select") {
//         $("#preven_chk_inp, #medi_amt_inp, #medi_exp_inp, #pre_helt_inp, #medi_insamu_inp, #medi_expamu_inp").val("");
//         $("#total_dedu_lab, #total_dedu_lab1, #total_eligi_lab").html("0");
//         _showtoastar("Regime/115BAC? left blank", "toast-warning", "Regime/115BAC? Error");
//         $("#pay_tax_selt").addClass("is-invalid").removeClass("is-valid");
//         return false;
//     } else {
//         $("#pay_tax_selt").removeClass("is-invalid").addClass("is-valid");
//     }

//     if (regime === "Yes") {
//         _showtoastar("You are not eligible to claim deduction u/s 80D.", "toast-warning", "Regime Error");
//         $("#preven_chk_inp, #medi_expamu_inp, #medi_insamu_inp, #pre_helt_inp, #medi_exp_inp, #medi_amt_inp").val("");
//         $("#total_dedu_lab, #total_dedu_lab1, #total_eligi_lab").html("0");
//         return false; // Add this line to stop further execution
//     }

//     return true;
// };

// $("#fin_year_selt, #pay_tax_selt").on("change", function () {
//     $.fn.show_err();
// });

// $("#onRadio input[type=radio], #onRadio1 input[type=radio]").change(function () {
//     var handicap_chk = $(this).val(); console.log(handicap_chk);
//     var medicshow = "";

//     if(handicap_chk === "Radio1_no"){
//         $("#medicshow1").addClass("d-none");
//         $("#medi_exp_inp").val("");
//         return false;
//     } else { console.log(handicap_chk);
//         $("#medicshow1").removeClass("d-none");
//     }

//     if(handicap_chk === "Radio2_no"){
//         $("#medicshow2").addClass("d-none");
//         $("#medi_expamu_inp").val("");
//     } else if (handicap_chk === "Radio2_yes") {
//         $("#medicshow2").removeClass("d-none");
//     }


//     var preventtxt = $("#preven_chk_inp").val();
//     var medicinstxt = $("#medi_amt_inp").val();
//     var medicexptxt = $("#medi_exp_inp").val();
//     var preventtxt1 = $("#pre_helt_inp").val();
//     var medicinstxt1 = $("#medi_insamu_inp").val();
//     var medicexptxt1 = $("#medi_expamu_inp").val();

//     var ttldecuc = Number(preventtxt) + Number(medicinstxt) + Number(medicexptxt);
//     $("#total_dedu_lab").html(ttldecuc - medicexptxt);

//     var e = Number(preventtxt) + Number(medicinstxt) + Number(preventtxt1) + Number(medicinstxt1) + Number(medicexptxt1);
//     $("#total_eligi_lab").html(e);
// });

// $("#preven_chk_inp, #medi_amt_inp, #medi_exp_inp").on("input", function () {
//     $.fn.show_err();
//     var preventtxt = $("#preven_chk_inp").val();
//     var medicinstxt = $("#medi_amt_inp").val();
//     var medicexptxt = $("#medi_exp_inp").val();
//     var preventtxt1 = $("#pre_helt_inp").val();
//     var medicinstxt1 = $("#medi_insamu_inp").val();
//     var medicexptxt1 = $("#medi_expamu_inp").val();
//     var total_dedu_lab1 = Number($("#total_dedu_lab1").html());

//     if(preventtxt1 != ""){
//         var ttldecuc = preventtxt > 0 ? Number(medicinstxt) + Number(medicexptxt) : Number(0) + Number(medicinstxt) + Number(medicexptxt);
//     }else{
//         var ttldecuc = preventtxt < 5000 ? Number(medicinstxt) + Number(medicexptxt) : Number(5000) + Number(medicinstxt) + Number(medicexptxt);
//     }

//     if (ttldecuc <= 50000) {
//         $("#total_dedu_lab").html(ttldecuc);
//         $("#total_eligi_lab").html(Number(total_dedu_lab1 + ttldecuc));
//     } else {
//         $("#total_dedu_lab1").html("50000");
//         $("#total_eligi_lab").html("50000");
//     }
// });

// $("#pre_helt_inp, #medi_insamu_inp, #medi_expamu_inp").on("input", function () {
//     $.fn.show_err();
//     var preventtxt = $("#preven_chk_inp").val();
//     var medicinstxt = $("#medi_amt_inp").val();
//     var medicexptxt = $("#medi_exp_inp").val();
//     var preventtxt1 = $("#pre_helt_inp").val();
//     var medicinstxt1 = $("#medi_insamu_inp").val();
//     var medicexptxt1 = $("#medi_expamu_inp").val();
//     var total_dedu_lab = Number($("#total_dedu_lab").html());
//     var preventtxt = $("#preven_chk_inp").val();

//     if(preventtxt != ""){
//         var ttldecuc1 = preventtxt1 > 0 ? Number(medicinstxt1) + Number(medicexptxt1) : Number(0) + Number(medicinstxt1) + Number(medicexptxt1);
//     }else{
//         var ttldecuc1 = preventtxt1 < 5000 ? Number(medicinstxt1) + Number(medicexptxt1) : Number(5000) + Number(medicinstxt1) + Number(medicexptxt1);
//     }

//     if (ttldecuc1 <= 50000) {
//         $("#total_dedu_lab1").html(ttldecuc1);
//         $("#total_eligi_lab").html(Number(total_dedu_lab + ttldecuc1));
//     } else {
//         $("#total_dedu_lab1").html("50000");
//         $("#total_eligi_lab").html("50000");
//     }
// });
