// Agregador de funcoes on-click
$(document).on('click', '.js-on-click', function (e) {
    var handler = $(this).data("on-click");
    eval(handler)($(this), e);
});

function deleteAction($t, $e) {
    $e.preventDefault();
    $e.stopPropagation();

    if(confirm('Are you sure?')){
        var t = $t;
        var id = t.data('delete-id');
        var source = t.data('delete-source');
        var url = t.data('delete-url');

        var postData = {
            _method: 'delete',
            _token: $('input[name=_token]').val(),
            id: id,
        };

        $.ajax({
            url: url,
            data: postData,
            type: 'delete',
            xhrFields: {
                withCredentials: true
            },

            success: function (data) {
                if (data.Error) {
                    return "Error";
                } else {
                    $('#' + source).html(data);
                }
            },

            error: function (xhr) {
                return "Error";
            }
        });
    }
}

function closeAction($t, $e) {
    $e.preventDefault();
    $e.stopPropagation();

    if(!confirm('Are you sure?')){
        $(".chk-close").prop("checked", false);
        return;
    }

    var t = $t;
    var id = t.data('close-id');
    var parentId = t.data('close-parent');
    var url = t.data('close-url');

    var postData = {
        _method: 'post',
        _token: $('input[name=_token]').val(),
        id: id,
    };

    $.ajax({
        url: url,
        data: postData,
        type: 'post',
        xhrFields: {
            withCredentials: true
        },

        success: function (data) {
            if (data.Error) {
                return "Error";
            } else {
                $('#project').html(data);
            }
        },

        error: function (xhr) {
            return "Error";
        }
    });
}
