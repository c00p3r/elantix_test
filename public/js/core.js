var core = (function ($) {

    this.updateUser = function (url, data) {
        $.ajax({
            type: "POST",
            url: url,
            dataType: 'json',
            data: data,
            complete: function (response) {
                response = JSON.parse(response.responseText);

                var html = '<div class="alert alert-dismissible alert-' + response.message.type + '">' +
                    '<button class="close" data-dismiss="alert">&times;</button>' +
                    response.message.text +
                    '</div>';
                $('#messages-container').html(html);
            }
        });
    };

    return this;

}).call(core || {}, jQuery);
//# sourceMappingURL=core.js.map
