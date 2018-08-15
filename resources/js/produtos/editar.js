$("#fld_nome").focus();
$(document).ready(function () {
    $(".btnExcluir").on('click', function () {
        $.post($(this).attr('data-url'), function (html) {
            $("#modalPlaceholder").html(html);
        });
    });
});