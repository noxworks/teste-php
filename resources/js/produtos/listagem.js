$(document).ready(function () {
    var cspan = $("#t_listagem > thead > tr > th").length;
    $("#t_listagem > tbody > tr[class=nenhum] > td").attr('colspan', cspan);

    $(".btnView").on('click', function () {
        $.post($(this).attr('data-url'), function (html) {
            $("#modalPlaceholder").html(html);
        });
    });

    $(".btnEditar").on('click', function () {
        document.location.href = $(this).attr('data-url');
    });

    $(".btnExcluir").on('click', function () {
        $.post($(this).attr('data-url'), function (html) {
            $("#modalPlaceholder").html(html);
        });
    });

    
    $(".btnEstoqueUp").on('click', function () {
        var id = $(this).attr('data-id');
        $.post($(this).attr('data-url'), {'id': id}, function (r) {
            if(r.sucesso){
                $('tr[data-id='+id+']> .td_qtd').text(r.qtd);
                if(r.qtd <= 3){
                    marcaRow(id);
                }else{
                    desmarcarRow(id);
                }
            }else{
                alert(r.msg);
            }
        },'json');
    });
    $(".btnEstoqueDown").on('click', function () {
        var id = $(this).attr('data-id');
        $.post($(this).attr('data-url'), {'id': id}, function (r) {
            if(r.sucesso){
                $('tr[data-id='+id+']> .td_qtd').text(r.qtd);
                if(r.qtd <= 3){
                    marcaRow(id);
                }else{
                    desmarcarRow(id);
                }
            }else{
                alert(r.msg);
            }
        },'json');
    });
    
    
    
    

    $("#hideBusca").on('click', function () {
        $(this).parent().parent().find(".panel-body").toggle('fast');
        $(this).parent().parent().find(".panel-footer").toggle('fast');
    });
    $("#fld_termo").focus();
});
function goPag(num) {
    $("input[name=page]").val(num);
    $("#form-filtro").submit();
}
function buscar() {
    $("#form-filtro").submit();
}
function marcaRow(id){
    $('tr[data-id='+id+']').addClass('table-warning').attr('title', 'Baixo Estoque');
}
function desmarcarRow(id){
    $('tr[data-id='+id+']').removeClass('table-warning').attr('title', '');
}