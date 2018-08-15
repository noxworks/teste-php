$(document).ready(function () {
    $("#fld_preco").mask("#.##0,00", {reverse: true});

});
function validaForm(urlValidacao, form) {
    $.post(urlValidacao, $(form).serialize(), function (html) {
        if (html != 1) {
            $("#modalPlaceholder").html(html);
        } else {
            $(form).attr('onSubmit', '').submit();
            return true;
        }
    });
    return false;
}

                         