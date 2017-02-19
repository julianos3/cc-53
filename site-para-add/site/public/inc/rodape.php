    <footer class="def-100">
        <div class="def-100 p-top-20 p-bottom-20 bx-footer bx-green">
            <div class="def-center">
                <div class="def-80 m-left-10 w-1280-100">
                    <p class="f-left m-top-10 color-white f-size-18 w-1024-100 t-align-1024-c">
                        Assine nossa newsletter e fique por dentro das novidades
                    </p>
                    <form class="f-right f-1024-l m-top-1024-20 relative-1024 left-1024-50 w-600-100 left-600-0" id="fNewsletter" method="post" action="">
                        <div class="def-100 b-radius-5 overflow-h">
                            <fieldset class="def-70">
                                <input class="def-90 p-left-5 p-right-5 border-none color-grey f-size-18" type="text" id="newsletter-email" name="newsletter[nome]" value="" placeholder="E-mail" />
                            </fieldset>
                            <input class="def-30 border-none bx-green-2 f-w-600 color-white f-size-18" type="submit" id="send-newsletter" name="send-newsletter" value="Enviar" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
            $objPaginas1 = new Paginas();
            $objPaginas1->id=1;
            $objPaginas1->carregar();
        ?>
        <div class="def-100 bx-green-2 p-top-50 p-bottom-50">
            <div class="def-center">
                <div class="def-100 w-1024-100">
                    <div class="def-35 def-text def-text-5 w-800-100">
                        <p class="f-w-600 color-green-2 f-size-2">
                            <?php echo $objPaginas1->titulo; ?>
                        </p>
                            <?php echo $objPaginas1->descricao; ?>
                    </div>
                    <nav class="def-20 m-left-5 menu-footer w-800-100">
                        <ul class="def-48 m-top-20 w-600-100">
                            <li class="f-w-600 color-green-2 f-size-18">
                               SITE 
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="">
                                    Funcionalidade
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="">
                                    Beneficios
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="">
                                    Blog
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="">
                                    Contato
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="">
                                    Experimente Gratis
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="">
                                    Entre no sistema
                                </a>
                            </li>
                        </ul>
                        <!--ul class="def-48 m-top-20 f-right w-600-100">
                            <li class="f-w-600 color-green-2 f-size-18">
                               FUNCIONALIDADES
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="">
                                    Funcionalidade
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="">
                                    Beneficios
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="">
                                    Blog
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="">
                                    Contato
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="">
                                    Experimente Gratis
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="">
                                    Entre no sistema
                                </a>
                            </li>
                        </ul>
                        <ul class="def-48 m-top-20 w-600-100">
                            <li class="f-w-600 color-green-2 f-size-18">
                               BENEFICIOS 
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="">
                                    Funcionalidade
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="">
                                    Beneficios
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="">
                                    Blog
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="">
                                    Contato
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="">
                                    Experimente Gratis
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="">
                                    Entre no sistema
                                </a>
                            </li>
                        </ul-->
                    </nav>
                    <div class="def-30 m-left-5 w-800-100 m-top-800-30">
                        <div class="def-100 f-w-600 color-green-2 f-size-18">
                           BENEFICIOS 
                        </div>
                        <p class="def-100 m-top-20 color-white f-size-3">
                            51 9987.6510
                        </p>
                        <p class="def-100 m-top-5 f-size-18">
                            <a class="color-white" href="" title="">
                                comercial@centralcondo.com.br
                            </a>
                        </p>
                        <img class="def-100 m-top-20" src="http://localhost/centralcondo/upload/banner/main-banner.jpg">
                        <!--div class="def-100 m-top-20 menu-footer m-top-1024-0">
                            <ul class="def-100 m-top-20">
                                <li class="f-w-600 color-green-2 f-size-18">
                                   Destaques do Blog 
                                </li>
                                <li>
                                    <a href="javascript:void(0);" title="">
                                        01. Primeira Notícias
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" title="">
                                        01. Primeira Notícias
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" title="">
                                        01. Primeira Notícias
                                    </a>
                                </li>
                                <li>
                                    <a class="m-top-10" href="javascript:void(0);" title="">
                                        Mais notícias
                                    </a>
                                </li>
                            </ul>
                        </nav-->
                    </div>
                    <div class="def-100 m-top-60 t-align-c">
                        <a class="f-w-600 color-white f-size-16 border-white back-top click-and-scroll smooth f-1024-l w-600-100" href="topo" title="VOLTAR PARA O TOPO">VOLTAR PARA O TOPO</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="def-100 bx-green-3 p-top-20 p-bottom-20">
        <div class="def-center">
            <div class="def-80 m-left-10 w-1024-100">
                <p class="f-left color-white f-size-16 w-800-100 t-align-800-c">
                    Copyright 2016 - Central Condo - Todos os direitos reservados.
                </p>
                <p class="f-right color-white f-size-16 w-800-100 t-align-800-c m-top-800-20">
                    Desenvolvido por <a class="color-white t-decoration" href="http://www.agencias3.com.br" target="_blank" title="AGÊNCIA S3">Agência S3</a>
                </p>
            </div>
        </div>
    </div>
</footer>
    <!-- js --> 
    <script type="text/javascript" src="<?php echo URLRAIZ; ?>/site/public/js/cycle.js"></script> 
    <script type="text/javascript" src="<?php echo URLRAIZ; ?>/site/public/js/plugins/masked.js"></script>
    <script type="text/javascript" src="<?php echo URLRAIZ; ?>/site/public/js/main.js"></script>
    <script type="text/javascript" src="<?php echo URLRAIZ; ?>/site/public/js/plugins/scrollreveal/scrollReveal.js"></script>
    <script type="text/javascript">
    window.scrollReveal = new scrollReveal();
    </script>
    <script type="text/javascript" src="<?php echo URLRAIZ; ?>/site/public/js/plugins/slick/slick.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo URLRAIZ; ?>/site/public/js/plugins/slick/scripts.js" type="text/javascript"></script>
    </body>
</html>