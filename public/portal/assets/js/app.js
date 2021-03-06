/*!
 * remark (http://getbootstrapadmin.com/remark)
 * Copyright 2016 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */
(function (document, window, $) {
    'use strict';

    var host = 'http://central/portal'

    window.App = Site.extend({
        handleSlidePanel: function () {
            if (typeof $.slidePanel === 'undefined') return;

            var defaults = $.components.getDefaults("slidePanel");
            var options = $.extend({}, defaults, {
                template: function (options) {
                    return '<div class="' + options.classes.base + ' ' + options.classes.base + '-' + options.direction + '">' +
                        '<div class="' + options.classes.base + '-scrollable"><div>' +
                        '<div class="' + options.classes.content + '"></div>' +
                        '</div></div>' +
                        '<div class="' + options.classes.base + '-handler"></div>' +
                        '</div>';
                },
                afterLoad: function () {
                    this.$panel.find('.' + this.options.classes.base + '-scrollable').asScrollable({
                        namespace: 'scrollable',
                        contentSelector: '>',
                        containerSelector: '>'
                    });
                }
            });

            $(document).on('click', '[data-toggle=slidePanel]', function (e) {
                $.slidePanel.show({
                    url: $(this).data('url'),
                    settings: {
                        cache: false
                    }
                }, options);

                e.stopPropagation();
            });
        },
        handleMultiSelect: function () {
            var $all = $('.select-all');

            $(document).on('change', '.multi-select', function (e, isSelectAll) {
                if (isSelectAll) return;

                var $select = $('.multi-select'),
                    total = $select.length,
                    checked = $select.find('input:checked').length;
                if (total === checked) {
                    $all.find('input').prop('checked', true);
                } else {
                    $all.find('input').prop('checked', false);
                }
            });

            $all.on('change', function () {
                var checked = $(this).find('input').prop('checked');

                $('.multi-select input').each(function () {
                    $(this).prop('checked', checked).trigger('change', [true]);
                });

            });
        },

        handleListActions: function () {
            $(document).on('click', '[data-toggle="list-editable"]', function () {
                var $btn = $(this),
                    $list = $btn.parents('.list-group-item'),
                    $content = $list.find('.list-content'),
                    $editable = $list.find('.list-editable');

                $content.hide();
                $editable.show();
                $editable.find('input:first-child').focus().select();
            });

            $(document).on('keydown', '.list-editable [data-bind]', function (event) {
                var keycode = (event.keyCode ? event.keyCode : event.which);

                if (keycode == 13 || keycode == 27) {
                    var $input = $(this),
                        bind = $input.data('bind'),
                        $list = $input.parents('.list-group-item'),
                        $content = $list.find('.list-content'),
                        $editable = $list.find('.list-editable'),
                        $update = bind ? $list.find(bind) : $list.find('.list-text');

                    if (keycode == 13) {
                        $update.html($input.val());
                    } else {
                        $input.val($update.text());
                    }

                    $content.show();
                    $editable.hide();
                }
            });

            $(document).on('click', '[data-toggle="list-editable-close"]', function () {
                var $btn = $(this),
                    $list = $btn.parents('.list-group-item'),
                    $content = $list.find('.list-content'),
                    $editable = $list.find('.list-editable');

                $content.show();
                $editable.hide();
            });
        },

        run: function (next) {
            this.handleSlidePanel();
            this.handleListActions();
            next();
        }


    });

    function getUfId(uf, city) {
        $.get('/portal/state/getUfId/' + uf, function (stateId) {
            var idUf = 0;
            $.each(stateId, function (key, value) {
                idUf = value.id
            });

            $('#uf').val(idUf).change();

            $.get('/portal/city/list/' + idUf, function (cidades) {
                $('#city').empty();
                $.each(cidades, function (key, value) {
                    var selected = '';
                    if (value.name.toLowerCase() == city.toLowerCase()) {
                        selected = 'selected';
                    }

                    $('#city').append('<option value=' + value.id + ' ' + selected + '>' + value.name + '</option>');
                });
            });

        });
    }

    //carregar cidade
    $('#uf').change(function () {
        var id_estado = $(this).val();
        $.get('/portal/city/list/' + id_estado, function (cidades) {
            $('#city').empty();
            $.each(cidades, function (key, value) {
                $('#city').append('<option value=' + value.id + '>' + value.name + '</option>');
            });
        });
    });

    //carrega endereço pelo cep
    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
        $("#ibge").val("");
    }

    //Quando o campo cep perde o foco.
    $("#cep").blur(function () {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#address").val("...");
                $("#district").val("...");
                $("#cidade").val("...");
                $("#uf").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("//viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#address").val(dados.logradouro);
                        $("#district").val(dados.bairro);
                        $("#cidade").val(dados.localidade);

                        //selected uf pegando namo e buscando o id e carregar a cidade

                        getUfId(dados.uf, dados.localidade);
                        $("#number").focus();
                        //getCidade(id_estado);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });

    $('#unit_type_id').change(function () {
        var type = $(this).val();
        if (type == '') {
            $('.apartamento').hide();
            $('.garagem').hide();
            $('.casa').hide();
        } else if (type == 2) { //casa
            $('.apartamento').hide();
            $(".apartamento input, .apartamento select").removeAttr("required");

            $('.garagem').hide();
            $(".garagem input, .garagem select").removeAttr("required");

            $('.garagem').hide();
            $('.casa').fadeIn();
            $(".casa input, .casa select").prop('required', true);


        } else if (type == 3) { //garagem
            $('.apartamento').hide();
            $(".apartamento input, .apartamento select").removeAttr("required");

            $('.casa').hide();
            $(".casa input, .casa select").removeAttr("required");

            $('.garagem').fadeIn();
            $(".garagem input, .garagem select").prop('required', true);
        } else { //apartamento, loja, sala
            $('.casa').hide();
            $(".casa input, .casa select").removeAttr("required");

            $('.garagem').hide();
            $(".garagem input, .garagem select").removeAttr("required");

            $('.apartamento').fadeIn();
            $(".apartamento input, .apartamento select").prop('required', true);
        }
    });

    //carregar unit
    $('#block_id').change(function () {
        var block_id = $(this).val();
        $.get('/portal/condominium/unit/block/' + block_id, function (units) {
            $('#unit_id').empty();
            $.each(units, function (key, value) {
                $('#unit_id').append('<option value=' + value.id + '>' + value.name + '</option>');
            });
        });
    });


    $('.btnComentarMsgPublic').bind('click', function () {
        var id = $(this).attr("data-id");
        $('#messageId').val(id);
    });

    $('.btnMaintenanceCompleted').bind('click', function () {
        var id = $(this).attr("data-id");
        $('#maintenanceId').val(id);
    });

    $('.btnMaintenanceViewCompleted').bind('click', function () {
        var id = $(this).attr('data-id');
        $.get('/portal/manage/maintenance/completed/' + id, function (result) {
            $('.showMaintenanceCompleted').html(result);
        });
    });

    $('.btnShowCam').bind('click', function () {
        var id = $(this).attr('data-id');
        $.get('/portal/condominium/security-cam/show/' + id, function (result) {
            $('.showCam').html(result);
        });
    });

    $('.btnEditGroup').bind('click', function () {
        var id = $(this).attr('data-id');
        $.get('/portal/condominium/group/edit/' + id, function (result) {
            $('.editGroup').html(result);
        });
    });

    $('.btnShowCalled').bind('click', function () {
        var id = $(this).attr('data-id');
        $.get('/portal/communication/called/show/' + id, function (result) {
            $('.showCalled').html(result);
        });
    });

    $('.btnShowModal').bind('click', function () {
        var route = $(this).attr('data-route');
        var routebtn = $(this).attr('data-route-btn');
        $.get(route, function (result) {
            if (routebtn != '') {
                $('.btnShowConfirm').attr("data-route", routebtn);
            }
            $('.showModal').html(result);
        });
    });

    $('.btnCreateModal').bind('click', function () {
        var route = $(this).attr('data-route');
        var title = $(this).attr('data-title');

        $.get(route, function (result) {
            $('.modal-title').html(title);
            $('.modal-body').html(result);
            createAjaxProvider();
        });
    });

    $('.btnShowConfirm').bind('click', function () {
        $('.close').click();
        var route = $(this).attr('data-route');
        var msg = $(this).attr('data-msg');
        $('.page-title').html(msg);
        $('.btnConfirm').prop("href", route);
    });

    $('.btnShowWarning').bind('click', function () {
        $('.close').click();
        var route = $(this).attr('data-route');
        var msg = $(this).attr('data-msg');
        $('.modal-body p').html(msg);
        $('.btnWarning').prop("href", route);
    });

    $('.communicationDestination').bind('click', function () {
        var value = $(this).val();
        if (value == 'group') {
            $('.groupsCommunication').fadeIn();
            $('.selectGroup').attr('required', 'required');
            $('.usersCommunication').hide();
            $('.selectUsers').removeAttr('required');
        } else if (value == 'users') {
            $('.usersCommunication').fadeIn();
            $('.selectUsers').attr('required', 'required');
            $('.groupsCommunication').hide();
            $('.selectGroup').removeAttr('required');
        } else {
            $('.groupsCommunication').hide();
            $('.selectGroup').removeAttr('required');
            $('.usersCommunication').hide();
            $('.selectUsers').removeAttr('required');
        }
    });

    /*
     $(window).load(function () {
     showNotification();
     });
     */

    $('.showNotification').bind('click', function () {
        $.get('/portal/communication/notification/click', function (result) {
            showNotification();
        });
    });

    $('.zoom-light-box').magnificPopup({
        type: 'image',
        removalDelay: 500,
        preloader: true,
        callbacks: {
            beforeOpen: function () {
                this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                this.st.mainClass = this.st.el.attr('data-effect');
            }
        },
        closeOnContentClick: true,
        midClick: true
    });

    //createAjaxProvider();
    btnDelete();

})(document, window, jQuery);

function showNotification() {
    $.get('/portal/communication/notification/show', function (result) {
        $('.showNotification').html(result);
    });
}

function createAjaxProvider() {
    $('#createAjaxProvider').submit(function () {
        var data = $(this).serialize();
        $.ajax({
            type: "POST",
            data: data,
            url: "/portal/condominium/provider/storeAjax",
            success: function (result) {
                getProviderSelect();
                $('.close').click();
            }
        });
        return false;
    });
}

function getProviderSelect() {
    $.get('/portal/condominium/provider/listAllSelect', function (result) {
        $('#provider_id').html(result)
    });
}

function btnDelete() {
    $('.btnDelete').bind('click', function () {
        var route = $(this).attr("data-route");
        $('.btnConfirmeDelete').prop("href", route);
    });
}

$.components.register("input-group-file", {
    api: function () {
        $(document).on("change", ".input-group-file [type=file]", function () {
            var $this = $(this);
            var $text = $(this).parents('.input-group-file').find('.form-control');
            var value = "";

            $.each($this[0].files, function (i, file) {
                value += file.name + ", ";
            });
            value = value.substring(0, value.length - 2);

            $text.val(value);
        });
    }
});

$.components.register("card", {
    mode: "init",
    defaults: {},
    init: function (context) {
        if (!$.fn.card) return;
        var defaults = $.components.getDefaults("card");

        $('[data-plugin="card"]', context).each(function () {
            var options = $.extend({}, defaults, $(this).data());

            if (options.target) {
                options.container = $(options.target);
            }
            $(this).card(options);
        });
    }
});
