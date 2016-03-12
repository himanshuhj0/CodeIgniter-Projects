$(function () {
    $("#subscribe").tooltip();
});

$(document).ready(function () {
    $("#GoSubscribe").click(function () {
        var emailadd = $("#subscribe").val();
        $.ajax({
            type: "POST",
            url: window.location + "competitions/subscribe",
            data: {email: emailadd}
        })
                .done(function (data) {
                    alert(data);
                });
    });
});