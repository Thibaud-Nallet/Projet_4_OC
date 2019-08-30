$(function () {

    $('#contact-form').submit(function (e) {
        e.preventDefault();
        $('.comments').empty();
        var postdata = $('#contact-form').serialize();

        $.ajax({
            type: 'POST',
            url: '/Projet_4_OC/public/php/formulaire_contact.php',
            data: postdata,
            dataType: 'json',
            success: function (json) {
                if (json.isSuccess) {
                    $("#contact-form").hide();
                    $('#msgEnvoi').show();
                    setTimeout(() => {
                        $('#msgEnvoi').empty();
                        $('#contact-form')[0].reset();
                        $('#msgEnvoi').hide();
                        $("#contact-form").show();
                    }, 5000);
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