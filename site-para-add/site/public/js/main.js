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
    $(".action-menu").click(function(){
        if(!$('body').hasClass('overflow-h')){
            $(".main-menu").removeClass('display-1024-none');
            $('body').addClass('overflow-h');
        }else{
            $(".main-menu").addClass('display-1024-none');
            $('body').removeClass('overflow-h');
        }
    });
    $(".main-menu ul li a").click(function(){
        if($('body').hasClass('overflow-h')){
            $(".action-menu").click();
        }
    });
    $(window).resize(function(){
        if($(window).innerWidth() > 1024 && $('body').hasClass('overflow-h')){
            $(".action-menu").click();
        };
    });
    $('.close-menu').click(function(){
            $(".main-menu").addClass('display-1024-none');
            $('body').removeClass('overflow-h');
    });
};
function scrollPage(x){
    var newbox = $('#'+x);
    $('html, body').animate({ scrollTop: newbox.offset().top - 0 }, 600);
};
function scrollHeader(){
    var y = $(".fix").offset().top;
    var i = $(".top").innerHeight() - 87;
    if(y > i){
        $("header").addClass('in-scroll');
    }else{
        $("header").removeClass('in-scroll');
    }
};
function heightBanner(){
    $(".ajust-height").innerHeight('auto');
    $(".ajust-height").innerHeight($(window).innerHeight());
};
$(document).ready(function(){
	heightBanner();
    $(window).load(function(){
        menuResponsive();
        mascara();
    });
    $(window).resize(function(){
		heightBanner();
    });
    $(window).scroll(function(){
        scrollHeader();
    });
    $(".click-and-scroll").click(function(){
        var $this = $(this);
        scrollPage($this.attr('href'));
        return false;
    });
    $("#fContact").submit(function(){
        var data = $(this).serialize();
        $.ajax({
            type: "POST",
            data: data,
            url: "/explum/site/public/contato-ajax.php",
            dataType: "html",
            beforeSend:  function() {
                $('#fContact .def-msg').html("<strong class='color-white f-w-600'>Enviando...</strong>");
            },
            success: function(result){
                if(result == 'Mensagem enviada com sucesso.'){
                    $('#fContact .def-msg').html("<strong class='color-white f-w-600'>"+result+"</strong>");
                    $('input[type=text],input[type=email], textarea, select').val('');
                }else{
                    $('#fContact .def-msg').html("<strong class='color-red f-w-600'>"+result+"</strong>");
                }
            }
        });
        return false;
    });
});
