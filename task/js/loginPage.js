$(document).ready(function () {
    $("#loginFormValidation").validate({
        rules: {
            email: {
                email: true,
                required: true
            },
            usrpassword: {
                minlength: 2,
                required: true
            },
        },
        messages: {
            email: {
                required: "Please Enter Your Email",
                email: "Please Enter a Valid Email"
            },
            usrpassword: {
                required: "Please Enter Your Password",
                minlength: "Password should be at least 6 characters"
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});
