$(function () {

    $('#contact-form').submit(function (e) {
        e.preventDefault();
       
        var postdata = $('#contact-form').serialize();

        $.ajax({
            type: 'POST',
            url: '/Projet_4_OC/controller/contactManager.php',
            data: postdata,
            dataType: 'json',
            success: function (json) {
                if (json.isSuccess) {
                    $('#contact-form').append("<p class='thank-you'>Votre message a bien été envoyé. Merci de m'avoir contacté :)</p>");
                    $('#contact-form')[0].reset();
                } else {
                    $('#firstname + .comments').html(json.firstnameError);
                    $('#name + .comments').html(json.nameError);
                    $('#email + .comments').html(json.emailError);
                    $('#phone + .comments').html(json.phoneError);
                    $('#message + .comments').html(json.messageError);
                }
            }
        });
    });

})