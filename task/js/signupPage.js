$(document).ready(function () {
    $("#signupFormValidation").validate({
        rules: {
            name: {
                minlength: 2,
                required: true
            },
            email: {
                email: true,
                required: true
            },
            password: {
                minlength: 2,
                required: true
            },
            gender: {
                required: true
            },
            clgname: {
                required: true
            },
            branch: {
                required: true
            }
        },
        messages: {
            name: {
                required: "Please Enter Your Name",
                minlength: "Name should be at least 2 characters"
            },
            email: {
                required: "Please Enter Your Email",
                email: "Please Enter a Valid Email"
            },
            password: {
                required: "Please Enter Your Password",
                minlength: "Password should be at least 6 characters"
            },
            gender: "Please Enter Your Gender",
            clgname: "Please Enter Your College Name",
            branch: "Please Enter Your Branch",
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});
