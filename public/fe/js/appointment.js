$(function () {
    var $form = $("#appointment_form");
    var $formMessages = $("#msg-status");

    $form.on("submit", function (event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: $form.attr("action"),
            data: $form.serialize(),
        })
            .done(function (response) {
                $formMessages.removeClass("alert-danger alert-success");

                if (response.status === "success") {
                    $formMessages
                        .addClass("alert-success")
                        .text(response.message);
                    $form[0].reset();
                } else if (response.status === "error") {
                    $formMessages
                        .addClass("alert-danger")
                        .text(response.message);
                }
            })
            .fail(function (jqXHR) {
                $formMessages
                    .removeClass("alert-success")
                    .addClass("alert-danger");
                var errorMessage =
                    jqXHR.responseJSON?.message ||
                    "Oops! An error occurred and your appointment process could not be completed.";
                $formMessages.text(errorMessage);
            });
    });
});
