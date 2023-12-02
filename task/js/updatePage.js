$(document).ready(function () {
    $("#updateFormValidation").validate({
        rules: {
            phno: {
                minlength: 10,
                required: true
            },
            age: {
                number: true,
                required: true
            },
            dob: {
                minlength: 6,
                required: true
            },
            profession: {
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
            phno: {
                required: "Please Enter Your Phone Number",
                minlength: "Phone Number should be at least 10 characters"
            },
            age: {
                required: "Please Enter Your Age",
                number: "Please Enter a Valid Number for Age"
            },
            dob: {
                required: "Please Enter Your Date of Birth",
                minlength: "Date of Birth should be at least 6 characters"
            },
            profession: {
                required: "Please Enter Your Profession"
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});
