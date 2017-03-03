<?php $__env->startSection('content'); ?>
<div class="def-100 m-top-100">
    <div class="def-center">
            <span class="def-100 f-w-400 color-grey f-size-14">
                Home : <b class="color-green f-w-600">Contato</b>
            </span>
    </div>
</div>
<div class="def-100 m-top-30">
    <div class="def-center">
        <h1 class="def-100 f-w-600 color-grey f-size-24">CONTATO</h1>
    </div>
</div>
<div class="def-100 p-top-30 p-bottom-180 bx-image-city p-top-1024-30 p-bottom-800-30">
    <div class="def-center">
        <section class="def-45 w-1024-48 w-800-100">
            <form class="def-100 def-form" id="fContact" method="post" action="">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <fieldset class="def-100 m-top-15">
                    <label class="def-100 f-w-400 color-grey f-size-16" for="contact-email">
                        Nome *
                    </label>
                    <input class="def-95 p-left-2-5 p-right-2-5 m-top-10 border-grey color-grey f-size-16" type="text" id="name" name="name" placeholder="Seu nome aqui" required="required" />
                </fieldset>
                <fieldset class="def-48 m-top-15 w-800-100">
                    <label class="def-100 f-w-400 color-grey f-size-16" for="contact-email">
                        E-mail *
                    </label>
                    <input class="def-90 p-left-5 p-right-5 m-top-10 border-grey color-grey f-size-16 w-800-95 p-left-800-2-5 p-right-800-2-5" type="email" id="email" name="email" placeholder="exemplo@exemplo.com.br" required="required"/>
                </fieldset>
                <fieldset class="def-48 f-right m-top-15 w-800-100 f-800-l">
                    <label class="def-100 f-w-400 color-grey f-size-16" for="contact-email">
                        Telefone *
                    </label>
                    <input class="def-90 p-left-5 p-right-5 m-top-10 border-grey color-grey f-size-16 masked-phone w-800-95 p-left-800-2-5 p-right-800-2-5" type="text" id="phone" name="phone" placeholder="(99) 9999-9999"  required="required"/>
                </fieldset>
                <span class="def-100"></span>
                <fieldset class="def-48 m-top-15 w-800-100">
                    <label class="def-100 f-w-400 color-grey f-size-16" for="contact-email">
                        Nome do condomínio
                    </label>
                    <input class="def-90 p-left-5 p-right-5 m-top-10 border-grey color-grey f-size-16 w-800-95 p-left-800-2-5 p-right-800-2-5" type="text" id="name_condominium" name="name_condominium" placeholder="" />
                </fieldset>
                <fieldset class="def-48 f-right m-top-15 w-800-100 f-800-l">
                    <label class="def-100 f-w-400 color-grey f-size-16" for="contact-email">
                        Nº de unidades no condominio?
                    </label>
                    <input class="def-90 p-left-5 p-right-5 m-top-10 border-grey color-grey f-size-16 w-800-95 p-left-800-2-5 p-right-800-2-5" type="text" id="num_unit" name="num_unit" placeholder="Apenas números" />
                </fieldset>
                <fieldset class="def-100 m-top-15">
                    <label class="def-100 f-w-400 color-grey f-size-16" for="contact-email">
                        Mensagem *
                    </label>
                    <textarea class="def-95 p-left-2-5 p-right-2-5 p-top-15 p-bottom-15 m-top-10 border-grey color-grey f-size-16" id="contact-message" name="message" placeholder="Dúvidas ou sugestões?" required="required"></textarea>
                </fieldset>
                <div class="def-100 def-msg"></div>
                <fieldset class="def-48 f-right m-top-15 w-800-100 f-800-l">
                    <input class="def-100 m-top-10 bx-green border-grey f-w-600 color-white f-size-18 pointer hover-bx-green smooth" type="submit" id="send-contact" name="send-contact" value="Enviar" />
                </fieldset>
            </form>
        </section>
        <aside class="def-40 f-right w-1024-48 w-800-100 m-top-800-30">
            <div class="def-100">
                <figure class="f-left">
                    <img src="<?php echo e(asset('site/images/icons/phone.png')); ?>" />
                </figure>
                <p class="f-left m-left-10-px color-grey f-size-16">
                    (51) 00229931
                </p>
            </div>
            <div class="def-100 m-top-30">
                <figure class="f-left">
                    <img src="<?php echo e(asset('site/images/icons/email.png')); ?>" />
                </figure>
                <p class="f-left m-left-10-px color-grey f-size-16">
                    <a class="color-grey" href="" >comercial@centralcondo.com.br</a>
                </p>
            </div>
        </aside>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.layouts.site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>