(function ($) {
    $(document).ready(function () {
        $("#cleaning-book").on("submit", function (event) {
            event.preventDefault();
            let submitUrl = $(this).attr("action");
            let serialized = $(this).serialize();
            let buttonText = $('#cleaning-book button').text();
            let formResult = $('.form-result');
            $.ajax({
                url: submitUrl,
                type: 'POST',
                data: serialized,
                beforeSend: function () {
                    $('#cleaning-book button').text('Sending...');
                },
                success: function (response) {
                    $('#cleaning-book button').text(buttonText);
                    response = JSON.parse(response);
                    formResult.addClass('alert alert-' + response.type);
                    formResult.text(response.message);

                },
            });
        });
    });
})(jQuery);
