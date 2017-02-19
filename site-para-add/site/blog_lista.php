    <div class="def-100 m-top-100">
        <div class="def-center">
            <span class="def-100 f-w-400 color-grey f-size-14">
                Home : <b class="color-green f-w-600">Blog</b> 
            </span>
        </div>
    </div>
    <div class="def-100 m-top-30">
        <div class="def-center">
            <h1 class="def-100 f-w-600 color-grey f-size-24">BLOG</h1>
        </div>
    </div>
    <div class="def-100 p-bottom-180 m-top-20 bx-image-city p-top-1024-0 p-bottom-1024-30">
        <div class="def-center">
            <?php
                $listaBlog = UtilObjeto::listar("blog", "WHERE ativo = 's' order by data desc");
                if(is_array($listaBlog)){
            ?>
            <section class="def-65 w-1024-100">
                <nav class="def-100">
                    <ul class="def-100">
                        <?php
                            foreach ($listaBlog as $idBlog => $dadosBlog) {
                        ?>
                        <li class="def-100 m-top-30">
                            <div class="def-100 p-bottom-30 bx-white border-grey-2">
                                <?php
                                    $listaBlogImagem = UtilObjeto::listar("blogimagem", "WHERE id_blog = ".$idBlog." order by principal,ordem asc limit 1");
                                    if(is_array($listaBlogImagem)){
                                        foreach ($listaBlogImagem as $idBlogImagem => $dadosBlogImagem) {
                                            if(isPost($dadosBlogImagem['legenda'])){ $legenda = $dadosBlogImagem['legenda']; }else{ $legenda = $dadosBlog['titulo']; }
                                ?>
                                <figure class="def-90 m-top-30 m-left-5 w-800-100 m-top-800-0">
                                    <a class="def-100" href="<?php echo URLRAIZ."/blog/".$idBlog."/".$dadosBlog['seo_link']; ?>" title="<?php echo $dadosBlog['titulo']; ?>">
                                        <img class="def-100" src="<?php echo URLUPLOAD."blog/".$dadosBlogImagem['imagem']; ?>" alt="<?php echo $legenda; ?>" title="<?php echo $legenda; ?>" />
                                    </a>
                                </figure>
                                <?php
                                        }
                                    }
                                ?>
                                <div class="def-90 m-left-5 m-top-30">
                                    <div class="def-100 f-w-600 color-grey f-size-24">
                                        <?php echo $dadosBlog['titulo']; ?>
                                    </div>
                                    <div class="def-100 m-top-30">
                                        <div class="f-left c-left">
                                            <figure>
                                                <img src="<?php echo URLICON."calendar.png"; ?>" />
                                            </figure>
                                            <time class="m-top-3 m-left-10-px f-w-400 color-grey f-size-16">
                                                <?php echo mysql_to_data($dadosBlog['data']); ?>
                                            </time>
                                        </div>
                                        <div class="def-100 def-text m-top-30">
                                            <?php echo resumo($dadosBlog['texto'], 300); ?>
                                        </div>
                                        <div class="def-100 m-top-30">
                                            <a class="f-right bx-green b-radius-5 f-w-600 color-white f-size-14 see-more" href="<?php echo URLRAIZ."/blog/".$idBlog."/".$dadosBlog['seo_link']; ?>" title="LEIA MAIS">
                                                LEIA MAIS
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </nav>
                <div class="def-100 m-top-60 t-align-c m-top-1024-30">
                    <a class="b-radius-5 f-w-600 color-grey f-size-16 border-grey smooth see-more f-1024-l w-600-100" href="" title="CARREGAR MAIS">CARREGAR MAIS</a>
                </div>
            </section>
            <?php
                }
            ?>
            <aside class="def-30 m-top-30 bx-white f-right w-1024-50 f-1024-l m-left-1024-25 m-top-1024-30 w-800-100">
                <div class="def-90 p-left-5 p-right-5 p-top-20 p-bottom-20 border-grey-2">
                    <form class="def-100 def-form" id="fSearch" method="post" action="">
                        <fieldset class="def-100 b-radius-5 border-grey-2 overflow-h">
                            <div class="def-70">
                                <input class="def-95 p-left-2-5 p-right-2-5 border-none color-grey f-size-16" type="text" id="email" value="" placeholder="Procurar..." />
                            </div>
                            <div class="def-30">
                                <input class="def-100 bx-green border-none f-w-600 color-white f-size-14 send-search pointer" type="submit" id="send-search" value="BUSCAR" />
                            </div>
                        </fieldset>
                    </form>
                    <nav class="def-100 m-top-30 list-group-category">
                        <ul class="def-100">
                            <li class="def-100 title-category">
                                CATEGORIA
                            </li>
                            <li class="def-100">
                                <a href="" title="CONDOMINOS">
                                    - Condominos
                                </a>
                            </li>
                            <li class="def-100">
                                <a href="" title="CONDÃ”MINOS">
                                    - Revendores
                                </a>
                            </li>
                            <li class="def-100">
                                <a href="" title="CONDÃ”MINOS">
                                    - Síndicos
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <nav class="def-100 m-top-30 list-group-category">
                        <ul class="def-100">
                            <li class="def-100 title-category">
                                ÚLTIMOS POSTS
                            </li>
                            <li class="def-100">
                                <a href="" title="CONDÃ”MINOS">
                                    - Vantagens do sistema Condlink
                                </a>
                            </li>
                            <li class="def-100">
                                <a href="" title="CONDÃ”MINOS">
                                    - Vantagens do sistema Condlink
                                </a>
                            </li>
                            <li class="def-100">
                                <a href="" title="CONDÃ”MINOS">
                                    - Vantagens do sistema Condlink
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <figure class="def-100 m-top-50">
                        <img class="def-100" src="<?php echo URLUPLOAD."banner/main-banner.jpg"; ?>" />
                    </figure>
                </div>
            </aside>
        </div>
    </div>