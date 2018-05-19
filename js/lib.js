$(document).ready(function () {
    $('#newsletter').submit(function () {
        var $this     = $(this),
            $response = $('#response'),
            $mail     = $('#signup-email'),
            testmail  = /^[^0-9][A-z0-9._%+-]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/,
            hasError  = false;

        $response.find('p').remove();

        if (!testmail.test($mail.val())) {
            alert('Please enter a valid email');
            hasError = true;
        }

        if (hasError === false) {

            $response.find('p').remove();
            $response.addClass('loading');

            $.ajax({
                type: "POST",
                dataType: 'json',
                cache: false,
                url: $this.attr('action'),
                data: $this.serialize()
            }).done(function (data) {
                $response.removeClass('loading');
                alert(data.message);
            }).fail(function() {
                $response.removeClass('loading');
                alert('An error occurred, please try again');
            })
        }


        return false;
    });
});
