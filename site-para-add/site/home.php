<?php
$title = "Home";
$ativo = "home";
include_once('site/public/inc/cabecalho.php');
?>
    <nav class="def-100 m-top-85 main-banner top relative m-top-1024-50 ajust-height">
        <ul class="def-100 def-h-100 cycle-slideshow relative z-index-1" id="slideshow" data-cycle-speed="2000" data-cycle-fx="fade" data-cycle-pager=".pager-banner" data-cycle-next=".next-banner" data-cycle-prev=".prev-banner" data-cycle-timeout="5000">
            <li class="def-100 def-h-100" style="background: url('<?php echo URLBANNER."main-banner.jpg"; ?>') no-repeat;background-size: cover;background-attachment: fixed;background-position: center center;"></li>
            <li class="def-100 def-h-100" style="background: url('<?php echo URLBANNER."banner-mobile.jpg"; ?>') no-repeat;background-size: cover;background-attachment: fixed;background-position: center center;"></li>
        </ul>
		<a class="absolute z-index-999 left-0 top-50 m-left-5 prev-banner" href="javascript:void(0);" title="ANTERIOR">
			<img class="f-left" src="<?php echo URLICON."prev.png"; ?>" />
		</a>
		<a class="absolute z-index-999 right-0 top-50 m-right-5 next-banner" href="javascript:void(0);" title="PRÓXIMO">
			<img class="f-left" src="<?php echo URLICON."next.png"; ?>" />
		</a>
    </nav>
    <div class="def-100 p-top-60 p-top-1024-30 bx-grey bx-image-city">
        <div class="def-center">
            <div class="def-80 m-left-10 w-1024-100" data-scroll-reveal="enter left move 200px">
                <div class="def-60 p-bottom-150 w-1024-100 p-bottom-1024-30">
                    <h1 class="def-100 t-upper color-grey f-size-28">
                        dê adeus as reuniões de condomínio.<br />
                        <strong class="def-100 m-top-10 t-upper f-w-600 color-grey">
                            conheça nosso sistema
                        </strong>
                    </h1>
                    <div class="def-90 m-top-20 def-text">
                        <p>
                            Lorem Ipsum é simplesmente uma <strong>simulação de texto</strong> da indústria 
tipográfica e de impressos, e vem sendo utilizado desde o século XVI.
                        </p>
                    </div>
                </div>
            </div>
            <figure class="def-47 f-right c-left image-description display-1024-none" data-scroll-reveal="enter bottom move 200px">
                <img class="def-100" src="<?php echo URLICON."dispositivos.png"; ?>" title="" alt="" />
            </figure>
        </div>
    </div>
    <div class="def-100 p-top-80 p-bottom-180 bx-image-city p-top-1024-30 p-bottom-1024-30">
        <div class="def-center">
            <h2 class="def-80 m-left-10 t-align-c color-green f-size-28 w-1024-100">
                A GESTÃO DO SEU CONDOMÍNIO NA <strong class="color-green f-w-600">PALMA DA SUA MÃO</strong>
            </h2>
            <div class="def-80 m-left-10 m-top-20 t-align-c def-text w-1024-100">
                <p>
                    Acesse nosso sistema onde estiver: Pelo <strong>computador, tablet e/ou celular</strong>
                </p>
            </div>
            <nav class="def-70 m-left-15 m-top-40 list-group w-1024-100">
                <ul class="def-100">
                    <div class="def-30 w-600-100" data-scroll-reveal="enter left move 200px">
                        <li class="def-100 m-top-30 green-image">
                            <div class="def-80 p-left-10 p-top-15 p-bottom-15 t-align-r def-text def-text-2">
                                <p>
                                    Melhoria do processo
                                    interno de comunicação
                                     e relacionamentos do
                                    condomínio
                                </p>
                            </div>
                        </li>
                        <li class="def-100 m-top-20 yellow-image">
                            <div class="def-80 p-left-10 p-top-15 p-bottom-15 t-align-r def-text def-text-2">
                                <p>
                                    Facilidade de navegação
                                </p>
                            </div>
                        </li>
                        <li class="def-100 m-top-20 red-image">
                            <div class="def-80 p-left-10 p-top-15 p-bottom-20 t-align-r def-text def-text-2">
                                <p>
                                    Armazenagem de arquivos
                                    de foto, PDF e demais
                                     informações relevantes
                                    do condomínio
                                </p>
                            </div>
                        </li>
                    </div>
                    <div class="def-30 m-left-5 w-600-100 m-top-600-30" data-scroll-reveal="enter bottom move 200px">
                        <figure class="def-100 w-600-40 m-left-600-30">
                            <img class="def-100" src="<?php echo URLICON."iphone.png"; ?>" />
                        </figure>
                    </div>
                    <div class="def-30 f-right w-600-100" data-scroll-reveal="enter right move 200px">
                        <li class="def-100 m-top-30 red-image-2">
                            <div class="def-80 p-left-10 p-top-20 p-bottom-15 def-text def-text-2">
                                <p>
                                    Acesso facilitado para condôminos e síndicos  por prataforma online
                                </p>
                            </div>
                        </li>
                        <li class="def-100 m-top-20 green-image-2">
                            <div class="def-80 p-left-10 p-top-20 p-bottom-15 def-text def-text-2">
                                <p>
                                    Registro de movimentação
                                </p>
                            </div>
                        </li>
                        <li class="def-100 m-top-20 yellow-image">
                            <div class="def-80 p-left-10 p-top-20 p-bottom-20 def-text def-text-2">
                                <p>
                                    Ferramenta barata, com excelente custo benefício
                                </p>
                            </div>
                        </li>
                    </div>
                </ul>
            </nav>
            <h3 class="def-80 m-left-10 m-top-60 t-align-c color-green f-size-28 w-1024-100">
                COMO PODEMOS <strong class="color-green f-w-600">TE AJUDAR?</strong>
            </h3>
            <nav class="def-100 m-top-30 list-help">
                <ul class="def-100 w-1024-102 w-600-100">
                    <li class="def-24 green-image-1 w-1024-48 m-right-1024-2 w-600-100" data-scroll-reveal="scale up 80%">
                        <div class="def-80 p-left-7-5 p-top-20 p-bottom-20 w-1024-90 p-left-1024-5">
                            <figure class="def-100 t-align-c">
                                <img src="<?php echo URLUPLOAD."help/icone2.png"; ?>" />
                            </figure>
                            <div class="def-100 m-top-10 f-w-600 l-height-14 t-align-c color-white f-size-2">
                                Portaria com identificação automática
                            </div>
                            <div class="def-100 m-top-10 t-align-c def-text def-text-3">
                                <p>
                                    Dê adeus ao controle remoto! 
                                    Pedestres e Veículos serão identificados automaticamente
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="def-25 green-image-2 w-1024-48 m-top-600-20 m-right-1024-2 w-600-100" data-scroll-reveal="move 200px">
                        <div class="def-80 f-right p-right-7-5 p-top-20 p-bottom-20 w-1024-90 p-left-1024-5">
                            <figure class="def-100 t-align-c">
                                <img src="<?php echo URLUPLOAD."help/icone2.png"; ?>" />
                            </figure>
                            <div class="def-100 m-top-10 f-w-600 l-height-14 t-align-c color-white f-size-2">
                                Portaria com identificação automática
                            </div>
                            <div class="def-100 m-top-10 t-align-c def-text def-text-3">
                                <p>
                                    Dê adeus ao controle remoto! 
                                    Pedestres e Veículos serão identificados automaticamente
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="def-25 green-image-3 m-left-2 w-1024-48 m-top-1024-20 m-left-1024-0 m-right-1024-2 w-600-100" data-scroll-reveal="move 400px">
                        <div class="def-80 p-left-7-5 p-top-20 p-bottom-20 w-1024-90 p-left-1024-5">
                            <figure class="def-100 t-align-c">
                                <img src="<?php echo URLUPLOAD."help/icone2.png"; ?>" />
                            </figure>
                            <div class="def-100 m-top-10 f-w-600 l-height-14 t-align-c color-white f-size-2">
                                Portaria com identificação automática
                            </div>
                            <div class="def-100 m-top-10 t-align-c def-text def-text-3">
                                <p>
                                    Dê adeus ao controle remoto! 
                                    Pedestres e Veículos serão identificados automaticamente
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="def-24 green-image-4 f-right f-1024-l w-1024-48 m-top-1024-20 m-right-1024-2 w-600-100" data-scroll-reveal="move 600px over">
                        <div class="def-80 f-right p-right-7-5 p-top-20 p-bottom-20 w-1024-90 p-left-1024-5 f-1024-l">
                            <figure class="def-100 t-align-c">
                                <img src="<?php echo URLUPLOAD."help/icone2.png"; ?>" />
                            </figure>
                            <div class="def-100 m-top-10 f-w-600 l-height-14 t-align-c color-white f-size-2">
                                Portaria com identificação automática
                            </div>
                            <div class="def-100 m-top-10 t-align-c def-text def-text-3">
                                <p>
                                    Dê adeus ao <strong>controle remoto! </strong>
                                    Pedestres e Veículos serão identificados automaticamente
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
            <?php
                $listaBeneficios = UtilObjeto::listar("beneficios", "WHERE ativo = 's' order by ordem asc");
                if(is_array($listaBeneficios)){
            ?>
            <nav class="def-100 list-group-beneft" data-scroll-reveal="move 200px">
                <ul class="def-103 w-1024-102 w-600-100">
                    <?php
                        $i = 0;
                        $i_1024 = 0;
                        foreach ($listaBeneficios as $idBeneficios => $dadosBeneficios) {
                            $i++;
                            $i_1024++;
                    ?>
                    <li class="def-30-3 m-top-60 m-right-3 w-1024-48 m-top-1024-30 m-right-1024-2 w-600-100">
                        <figure class="def-30 relative-480 left-480-50">
                            <img class="w-480-100" src="<?php echo URLUPLOAD."beneficios/".$dadosBeneficios['imagem']; ?>" alt="<?php echo $dadosBeneficios['titulo']; ?>" title="<?php echo $dadosBeneficios['titulo']; ?>" />
                        </figure>
                        <div class="def-65 f-right def-text def-text-4 w-480-100 m-top-480-10">
                            <p class="f-w-600 color-green f-size-2">
                                <?php echo $dadosBeneficios['titulo']; ?>
                            </p>
                                <?php echo $dadosBeneficios['texto']; ?>
                        </div>
                    </li>
                    <?php
                        if($i == 3){ echo '<span class="def-100 display-1024-none"></span>'; $i=0;}
                        if($i_1024 == 2){ echo '<span class="def-100 none display-1024-block"></span>'; $i_1024=0;}
                        }
                    ?>
                </ul>
            </nav>
            <?php
                }
            ?>
            <h4 class="def-80 m-left-10 m-top-60 t-align-c color-green f-size-28 w-1024-100 m-top-1024-30 f-size-1024-25">
                <strong class="color-green f-w-600">MODERNIZE</strong> A PORTARIA DO SEU <strong class="color-green f-w-600">CONDOMÍNIO</strong>
            </h4>
        </div>
    </div>
<?php include_once('site/public/inc/rodape.php');