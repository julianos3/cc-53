<?php
$title = "Funcionalidades";
$ativo = "funcionalidades";
include_once('site/public/inc/cabecalho.php');
?>
    <div class="def-100 m-top-100">
        <div class="def-center">
            <span class="def-100 f-w-400 color-grey f-size-14">
                Home : <b class="color-green f-w-600">Funcionalidades</b>
            </span>
        </div>
    </div>
    <div class="def-100 m-top-30">
        <div class="def-center">
            <h1 class="def-100 f-w-600 color-grey f-size-24">FUNCIONALIDADES</h1>
        </div>
    </div>
    <div class="def-100 p-top-40 p-bottom-180 bx-image-city p-top-1024-30 p-bottom-1024-30">
        <div class="def-center">
            <?php
                $listaFuncionalidades = UtilObjeto::listar("funcionalidades", "WHERE ativo = 's' order by ordem asc");
                if(is_array($listaFuncionalidades)){
            ?>
            <nav class="def-100 list-group-functions">
                <ul class="def-100 w-1024-102 w-600-100">
                    <?php
                        $i = 0;
                        $i_1024 = 0;
                        $a = 0;
                        $aInfinit = 0;
                        $total = count($listaFuncionalidades);
                        $b = $total - 3;
                        foreach ($listaFuncionalidades as $idFuncionalidades => $dadosFuncionalidades) {
                            $i++;
                            $i_1024++;
                            $a++;
                            $aInfinit++;
                    ?>
                    <li class="def-33-33">
                        <div class="def-90 bx-border 
                            <?php
                                if($a==1){ echo ' no-left'; }
                                if($a==3){ echo ' no-right';$a=0; }
                                if($aInfinit < 4){ echo ' no-top'; }
                                if($aInfinit > $b){ echo ' no-bottom'; }
                            ?>">
                            <figure class="def-100 t-align-c">
                                <img class="max-w-100" src="<?php echo URLUPLOAD."funcionalidades/".$dadosFuncionalidades['imagem']; ?>" alt="<?php echo $dadosFuncionalidades['titulo']; ?>" title="<?php echo $dadosFuncionalidades['titulo']; ?>" />
                            </figure>
                            <div class="def-100 m-top-20 t-align-c t-upper f-w-600 color-grey f-size-18">
                                <?php echo $dadosFuncionalidades['titulo']; ?>
                            </div>
                            <div class="def-100 m-top-10 def-text def-text-6">
                                <?php echo $dadosFuncionalidades['texto']; ?>
                            </div>
                        </div>
                    </li>
                    <?php
                        if($i == 3){ echo '<span class="def-100 display-1024-none"></span>'; $i=0;}
                        if($i_1024 == 2){ echo '<span class="def-100 none display-1024-block"></span>'; $i_1024=0;}
                        }
                    ?>
                    <!--li class="def-33-33">
                        <div class="def-90 bx-border no-top">
                            <figure class="def-100 t-align-c">
                                <img src="<?php echo URLUPLOAD."help/icone.png"; ?>" />
                            </figure>
                            <div class="def-100 m-top-20 t-align-c f-w-600 color-grey f-size-18">
                                AGÊNDA DE AMBIENTES
                            </div>
                            <div class="def-100 m-top-10 def-text def-text-6">
                                <p>
                                    Dê adeus ao controle remoto! 
                                    Pedestres e Veículos serão
                                     identificados automaticamente
                                </p>
                                <ul>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Termos de uso.</li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="def-33-33">
                        <div class="def-90 bx-border no-right no-top">
                            <figure class="def-100 t-align-c">
                                <img src="<?php echo URLUPLOAD."help/icone.png"; ?>" />
                            </figure>
                            <div class="def-100 m-top-20 t-align-c f-w-600 color-grey f-size-18">
                                AGÊNDA DE AMBIENTES
                            </div>
                            <div class="def-100 m-top-10 def-text def-text-6">
                                <p>
                                    Dê adeus ao controle remoto! 
                                    Pedestres e Veículos serão
                                     identificados automaticamente
                                </p>
                                <ul>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Termos de uso.</li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="def-33-33">
                        <div class="def-90 bx-border no-left">
                            <figure class="def-100 t-align-c">
                                <img src="<?php echo URLUPLOAD."help/icone.png"; ?>" />
                            </figure>
                            <div class="def-100 m-top-20 t-align-c f-w-600 color-grey f-size-18">
                                AGÊNDA DE AMBIENTES
                            </div>
                            <div class="def-100 m-top-10 def-text def-text-6">
                                <p>
                                    Dê adeus ao controle remoto! 
                                    Pedestres e Veículos serão
                                     identificados automaticamente
                                </p>
                                <ul>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Termos de uso.</li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="def-33-33">
                        <div class="def-90 bx-border">
                            <figure class="def-100 t-align-c">
                                <img src="<?php echo URLUPLOAD."help/icone.png"; ?>" />
                            </figure>
                            <div class="def-100 m-top-20 t-align-c f-w-600 color-grey f-size-18">
                                AGÊNDA DE AMBIENTES
                            </div>
                            <div class="def-100 m-top-10 def-text def-text-6">
                                <p>
                                    Dê adeus ao controle remoto! 
                                    Pedestres e Veículos serão
                                     identificados automaticamente
                                </p>
                                <ul>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Termos de uso.</li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="def-33-33">
                        <div class="def-90 bx-border no-right">
                            <figure class="def-100 t-align-c">
                                <img src="<?php echo URLUPLOAD."help/icone.png"; ?>" />
                            </figure>
                            <div class="def-100 m-top-20 t-align-c f-w-600 color-grey f-size-18">
                                AGÊNDA DE AMBIENTES
                            </div>
                            <div class="def-100 m-top-10 def-text def-text-6">
                                <p>
                                    Dê adeus ao controle remoto! 
                                    Pedestres e Veículos serão
                                     identificados automaticamente
                                </p>
                                <ul>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Termos de uso.</li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="def-33-33">
                        <div class="def-90 bx-border no-left no-bottom">
                            <figure class="def-100 t-align-c">
                                <img src="<?php echo URLUPLOAD."help/icone.png"; ?>" />
                            </figure>
                            <div class="def-100 m-top-20 t-align-c f-w-600 color-grey f-size-18">
                                AGÊNDA DE AMBIENTES
                            </div>
                            <div class="def-100 m-top-10 def-text def-text-6">
                                <p>
                                    Dê adeus ao controle remoto! 
                                    Pedestres e Veículos serão
                                     identificados automaticamente
                                </p>
                                <ul>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Termos de uso.</li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="def-33-33">
                        <div class="def-90 bx-border no-bottom">
                            <figure class="def-100 t-align-c">
                                <img src="<?php echo URLUPLOAD."help/icone.png"; ?>" />
                            </figure>
                            <div class="def-100 m-top-20 t-align-c f-w-600 color-grey f-size-18">
                                AGÊNDA DE AMBIENTES
                            </div>
                            <div class="def-100 m-top-10 def-text def-text-6">
                                <p>
                                    Dê adeus ao controle remoto! 
                                    Pedestres e Veículos serão
                                     identificados automaticamente
                                </p>
                                <ul>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Termos de uso.</li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="def-33-33">
                        <div class="def-90 bx-border no-right no-bottom">
                            <figure class="def-100 t-align-c">
                                <img src="<?php echo URLUPLOAD."help/icone.png"; ?>" />
                            </figure>
                            <div class="def-100 m-top-20 t-align-c f-w-600 color-grey f-size-18">
                                AGÊNDA DE AMBIENTES
                            </div>
                            <div class="def-100 m-top-10 def-text def-text-6">
                                <p>
                                    Dê adeus ao controle remoto! 
                                    Pedestres e Veículos serão
                                     identificados automaticamente
                                </p>
                                <ul>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Termos de uso.</li>
                                </ul>
                            </div>
                        </div>
                    </li-->
                </ul>
            </nav>
            <?php
                }
            ?>
            <!--nav class="def-100 list-group-functions2">
                <ul class="def-102 w-600-100">
                    <li class="def-23 m-top-100 m-right-2 w-1024-48 m-top-1024-80 w-600-100">
                        <div class="def-90 p-left-5 p-right-5 p-bottom-15 border-green">
                            <div class="def-100">
                                <figure class="f-left b-radius-100 relative left-50 bx-green">
                                    <div class="def-100 def-h-100 table t-align-c">
                                        <span class="inline">
                                            <img width="40%" src="<?php echo URLUPLOAD."help/icone.png"; ?>" />
                                        </span>
                                    </div>
                                </figure>
                            </div>
                            <div class="def-100 m-top-20 t-align-c f-w-600 color-grey f-size-18">
                                AGÊNDA DE AMBIENTES
                            </div>
                            <div class="def-100 m-top-10 def-text def-text-6">
                                <p>
                                    Dê adeus ao controle remoto! 
                                    Pedestres e Veículos serão
                                     identificados automaticamente
                                </p>
                                <ul>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Termos de uso.</li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="def-23 m-top-100 m-right-2 w-1024-48 m-top-1024-80 w-600-100">
                        <div class="def-90 p-left-5 p-right-5 p-bottom-15 border-green">
                            <div class="def-100">
                                <figure class="f-left b-radius-100 relative left-50 bx-green">
                                    <div class="def-100 def-h-100 table t-align-c">
                                        <span class="inline">
                                            <img width="40%" src="<?php echo URLUPLOAD."help/icone.png"; ?>" />
                                        </span>
                                    </div>
                                </figure>
                            </div>
                            <div class="def-100 m-top-20 t-align-c f-w-600 color-grey f-size-18">
                                AGÊNDA DE AMBIENTES
                            </div>
                            <div class="def-100 m-top-10 def-text def-text-6">
                                <p>
                                    Dê adeus ao controle remoto! 
                                    Pedestres e Veículos serão
                                     identificados automaticamente
                                </p>
                                <ul>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Termos de uso.</li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="def-23 m-top-100 m-right-2 w-1024-48 m-top-1024-80 w-600-100">
                        <div class="def-90 p-left-5 p-right-5 p-bottom-15 border-green">
                            <div class="def-100">
                                <figure class="f-left b-radius-100 relative left-50 bx-green">
                                    <div class="def-100 def-h-100 table t-align-c">
                                        <span class="inline">
                                            <img width="40%" src="<?php echo URLUPLOAD."help/icone.png"; ?>" />
                                        </span>
                                    </div>
                                </figure>
                            </div>
                            <div class="def-100 m-top-20 t-align-c f-w-600 color-grey f-size-18">
                                AGÊNDA DE AMBIENTES
                            </div>
                            <div class="def-100 m-top-10 def-text def-text-6">
                                <p>
                                    Dê adeus ao controle remoto! 
                                    Pedestres e Veículos serão
                                     identificados automaticamente
                                </p>
                                <ul>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Termos de uso.</li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="def-23 m-top-100 m-right-2 w-1024-48 m-top-1024-80 w-600-100">
                        <div class="def-90 p-left-5 p-right-5 p-bottom-15 border-green">
                            <div class="def-100">
                                <figure class="f-left b-radius-100 relative left-50 bx-green">
                                    <div class="def-100 def-h-100 table t-align-c">
                                        <span class="inline">
                                            <img width="40%" src="<?php echo URLUPLOAD."help/icone.png"; ?>" />
                                        </span>
                                    </div>
                                </figure>
                            </div>
                            <div class="def-100 m-top-20 t-align-c f-w-600 color-grey f-size-18">
                                AGÊNDA DE AMBIENTES
                            </div>
                            <div class="def-100 m-top-10 def-text def-text-6">
                                <p>
                                    Dê adeus ao controle remoto! 
                                    Pedestres e Veículos serão
                                     identificados automaticamente
                                </p>
                                <ul>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Termos de uso.</li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="def-23 m-top-100 m-right-2 w-1024-48 m-top-1024-80 w-600-100">
                        <div class="def-90 p-left-5 p-right-5 p-bottom-15 border-green">
                            <div class="def-100">
                                <figure class="f-left b-radius-100 relative left-50 bx-green">
                                    <div class="def-100 def-h-100 table t-align-c">
                                        <span class="inline">
                                            <img width="40%" src="<?php echo URLUPLOAD."help/icone.png"; ?>" />
                                        </span>
                                    </div>
                                </figure>
                            </div>
                            <div class="def-100 m-top-20 t-align-c f-w-600 color-grey f-size-18">
                                AGÊNDA DE AMBIENTES
                            </div>
                            <div class="def-100 m-top-10 def-text def-text-6">
                                <p>
                                    Dê adeus ao controle remoto! 
                                    Pedestres e Veículos serão
                                     identificados automaticamente
                                </p>
                                <ul>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Termos de uso.</li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="def-23 m-top-100 m-right-2 w-1024-48 m-top-1024-80 w-600-100">
                        <div class="def-90 p-left-5 p-right-5 p-bottom-15 border-green">
                            <div class="def-100">
                                <figure class="f-left b-radius-100 relative left-50 bx-green">
                                    <div class="def-100 def-h-100 table t-align-c">
                                        <span class="inline">
                                            <img width="40%" src="<?php echo URLUPLOAD."help/icone.png"; ?>" />
                                        </span>
                                    </div>
                                </figure>
                            </div>
                            <div class="def-100 m-top-20 t-align-c f-w-600 color-grey f-size-18">
                                AGÊNDA DE AMBIENTES
                            </div>
                            <div class="def-100 m-top-10 def-text def-text-6">
                                <p>
                                    Dê adeus ao controle remoto! 
                                    Pedestres e Veículos serão
                                     identificados automaticamente
                                </p>
                                <ul>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Termos de uso.</li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="def-23 m-top-100 m-right-2 w-1024-48 m-top-1024-80 w-600-100">
                        <div class="def-90 p-left-5 p-right-5 p-bottom-15 border-green">
                            <div class="def-100">
                                <figure class="f-left b-radius-100 relative left-50 bx-green">
                                    <div class="def-100 def-h-100 table t-align-c">
                                        <span class="inline">
                                            <img width="40%" src="<?php echo URLUPLOAD."help/icone.png"; ?>" />
                                        </span>
                                    </div>
                                </figure>
                            </div>
                            <div class="def-100 m-top-20 t-align-c f-w-600 color-grey f-size-18">
                                AGÊNDA DE AMBIENTES
                            </div>
                            <div class="def-100 m-top-10 def-text def-text-6">
                                <p>
                                    Dê adeus ao controle remoto! 
                                    Pedestres e Veículos serão
                                     identificados automaticamente
                                </p>
                                <ul>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Termos de uso.</li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="def-23 m-top-100 m-right-2 w-1024-48 m-top-1024-80 w-600-100">
                        <div class="def-90 p-left-5 p-right-5 p-bottom-15 border-green">
                            <div class="def-100">
                                <figure class="f-left b-radius-100 relative left-50 bx-green">
                                    <div class="def-100 def-h-100 table t-align-c">
                                        <span class="inline">
                                            <img width="40%" src="<?php echo URLUPLOAD."help/icone.png"; ?>" />
                                        </span>
                                    </div>
                                </figure>
                            </div>
                            <div class="def-100 m-top-20 t-align-c f-w-600 color-grey f-size-18">
                                AGÊNDA DE AMBIENTES
                            </div>
                            <div class="def-100 m-top-10 def-text def-text-6">
                                <p>
                                    Dê adeus ao controle remoto! 
                                    Pedestres e Veículos serão
                                     identificados automaticamente
                                </p>
                                <ul>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Determine valores e regras para cada area comum.</li>
                                    <li>Termos de uso.</li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav-->
        </div>
    </div>
<?php include_once('site/public/inc/rodape.php');