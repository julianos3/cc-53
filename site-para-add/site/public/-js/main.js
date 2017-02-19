function mascara(){
    var masks = ['(00) 00000-0000', '(00) 0000-00009'];
    $(".masked-phone").mask(masks[1], {onKeyPress: 
        function(val, e, field, options) {
            field.mask(val.length > 14 ? masks[0] : masks[1], options) ;
        }
    });
    $(".masked-cep").mask("99999-999");
    $(".masked-cpf").mask("999.999.999-99");
    $(".masked-cnpj").mask("99.999.999/9999-99");
    $(".masked-date").mask("99/99/9999");
    $('.masked-money').mask('000.000.000.000.000,00', {reverse: true});
};
function menuResponsive(){
    $(".action-menu").toggle(function(){
        $(".main-menu").removeClass('display-1024-none');
        $('body').addClass('overflow-h');
    },function(){
        $(".main-menu").addClass('display-1024-none');
        $('body').removeClass('overflow-h');
    });
    $(window).resize(function(){
        if($(window).innerWidth() > 1024 && $('body').hasClass('overflow-h')){
            $(".action-menu").click();
        };
    });
    $('.close-menu').click(function(){
        $(".action-menu").click();
    });
};
function hBanner(){
    var h = $(window).innerHeight() - 107;
    $(".main-banner").innerHeight('auto');
    $(".main-banner").innerHeight(h);
}
$(document).ready(function(){
    $(window).load(function(){
        menuResponsive();
        mascara();
    });
    $(window).resize(function(){
        HeightPage();
    });
    $(window).scroll(function(){
    });
});