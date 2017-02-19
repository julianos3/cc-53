<?php
$title = "Benefícios";
$ativo = "beneficios";
include_once('site/public/inc/cabecalho.php');
?>
    <div class="def-100 m-top-100">
        <div class="def-center">
            <span class="def-100 f-w-400 color-grey f-size-14">
                Home : <b class="color-green f-w-600">Benefícios</b> 
            </span>
        </div>
    </div>
    <div class="def-100 m-top-30">
        <div class="def-center">
            <h1 class="def-100 f-w-600 color-grey f-size-24">BENEFÍCIOS</h1>
        </div>
    </div>
    <div class="def-100 p-bottom-180 bx-image-city p-top-1024-0 p-bottom-1024-30">
        <div class="def-center">
            <?php
                $listaBeneficios = UtilObjeto::listar("beneficios", "WHERE ativo = 's' order by ordem asc");
                if(is_array($listaBeneficios)){
            ?>
            <nav class="def-100 list-group-beneft">
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
                        <div class="def-65 f-right def-text def-text-4 w-480-100 m-top-480-10 t-align-480-c">
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
        </div>
    </div>
<?php include_once('site/public/inc/rodape.php');