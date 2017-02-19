<div class="def-100 bx-yellow-2 m-top-20">
	<div class="def-center">
		<form class="f-left relative left-50 fSearch2" id="fSearch" method="post" action="<?php echo URLRAIZ; ?>/na-midia/busca">
			<div class="def-80 m-left-10">
				<fieldset class="def-15 m-top-12">
					<input class="def-100 pointer border-none" type="submit" id="send-search" name="send-search" value="" />
				</fieldset>
				<fieldset class="def-85 m-top-17">
					<input class="def-90 p-left-5 p-right-5 border-none bx-yellow-2 color-grey f-size-14" type="text" id="txt" name="txt" value="" placeholder="BUSCA DE REGISTROS..." />
				</fieldset>
			</div>
		</form>
	</div>
</div>
<div class="def-100 bx-yellow-2 p-top-30 p-bottom-30">
    <div class="def-center">
        <h1 class="def-100 f-w-400 color-black f-size-22 f-family-1">
            Na Midia
        </h1>
        <div class="def-100 h-1 m-top-10 bx-grey"></div>
        <?php
        $total = 0;

        if($exp[1] == 'busca'){
            $listarMidia = UtilObjeto::listar("namidia", $Where);
        }else{
            $listarMidia = UtilObjeto::listar("namidia","where ativo = 's' order by data limit 3");
        }

        if($exp[1] == 'busca'){
            if(is_array($listarMidia)){
                $total = count($listarMidia);
                echo '<h1 class="def-100 m-top-30 t-align-c color-blue f-size-25">Encontramos em sua busca um total de "'.$total.'" Publicações(s).</h1>';
            }
        }
        if(is_array($listarMidia)){
            ?>
            <nav class="def-100">
                <ul class="def-100">
                    <?php foreach($listarMidia as $idM => $midia){ ?>
                        <li class="def-100 m-top-20">
                            <a href="<?php echo URLRAIZ."/na-midia/".$idM."/".$midia['seo_link']; ?>" title="<?php echo $midia['titulo']; ?>">
                                <div class="def-78 f-right">
                                    <div class="def-100 m-top-10 color-blue-2 f-size-22 f-family-1">
                                        <?php echo $midia['titulo']; ?>
                                    </div>
                                    <div class="def-100 m-top-15 def-text t-align-j">
                                        <?php echo $midia['texto']; ?>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        <?php }else{
            if($exp[1] == "busca"){
                echo '<h1 class="def-100 m-top-30 t-align-c color-blue f-size-25">Não foi possivel encontrar publicações referentes a busca.</h1>';
            }else{
                echo '<h1 class="def-100 m-top-30 t-align-c color-blue f-size-25">Nenhuma publicação Cadastrada.</h1>';
            }
        } ?>
    </div>
</div>
<?php include_once('site/public/inc/rodape.php');