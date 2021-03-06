@extends('site.layouts.site')

@section('content')
    <    <div class="def-100 m-top-100">
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
    <div class="def-100 p-bottom-180 m-top-50 bx-image-city p-top-1024-0 p-bottom-1024-30">
        <div class="def-center">
            <section class="def-65 w-1024-100">
                <nav class="def-100">
                    <ul class="def-100">
                        <li class="def-100">
                            <div class="def-100 background-white border-grey-2">
                                @if($blog->images)
                                    @foreach($blog->images as $image)
                                    <figure class="def-90 m-top-30 m-left-5 w-800-100 m-top-800-0">
                                        <img class="def-100" src="{!! asset('uploads/blog/'.$image->image) !!}" title="" alt="" />
                                    </figure>
                                    @endforeach
                                @endif
                                <div class="def-90 m-left-5 p-top-30 p-bottom-30">
                                    <div class="def-100 f-w-600 color-grey f-size-24">
                                        {!! $blog->name !!}
                                    </div>
                                    <div class="def-100 m-top-30">
                                        <div class="f-left c-left">
                                            <figure>
                                                <img src="{!! asset('site/images/icons/calendar.png') !!}" />
                                            </figure>
                                            <time class="m-top-3 m-left-10-px f-w-400 color-grey f-size-16">
                                                {!! date('d/m/Y', strtotime($blog->date)) !!}
                                            </time>
                                        </div>
                                        <div class="f-left c-left m-left-25-px">
                                            <a class="f-left click-and-scroll" href="comentarios" title="DEIXA UM COMENTÁRIO">
                                                <figure>
                                                    <img src="{!! asset('site/images/icons/comment.png') !!}" />
                                                </figure>
                                                <p class="m-top-3 m-left-10-px f-w-400 color-grey f-size-16">
                                                    Deixe um comentário
                                                </p>
                                            </a>
                                        </div>
                                        <div class="def-100 def-text m-top-30">
                                            {!! $blog->description !!}
                                        </div>

                                        <div class="def-100 p-top-50 overflow-h" id="comentarios">
                                            <div id="def-100 fb-root"></div>
                                            <script>(function(d, s, id) {
                                                    var js, fjs = d.getElementsByTagName(s)[0];
                                                    if (d.getElementById(id)) return;
                                                    js = d.createElement(s); js.id = id;
                                                    js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.8&appId=159181744239297";
                                                    fjs.parentNode.insertBefore(js, fjs);
                                                }(document, 'script', 'facebook-jssdk'));</script>
                                            <div class="def-100 fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5"></div>
                                        </div>
                                        <nav class="def-100 m-top-50 m-top-1024-30">
                                            <h2 class="def-100 f-w-600 color-grey f-size-18">RELACIONADOS</h2>
                                            <ul class="def-102 w-600-100">
                                                <?php
                                                $i = 0;
                                                $listaBlog=[];
                                                foreach ($listaBlog as $idBlog => $dadosBlog) {
                                                $i++;
                                                ?>
                                                <li class="def-31-3 m-right-2 m-top-30 w-1024-48 w-600-100">
                                                    <div class="def-100 p-bottom-15 bx-white border-grey-2">
                                                        <?php
                                                        $listaBlogImagem = UtilObjeto::listar("blogimagem", "WHERE id_blog = ".$idBlog." order by principal,ordem asc limit 1");
                                                        if(is_array($listaBlogImagem)){
                                                        foreach ($listaBlogImagem as $idBlogImagem => $dadosBlogImagem) {
                                                        if(isPost($dadosBlogImagem['legenda'])){ $legenda = $dadosBlogImagem['legenda']; }else{ $legenda = $dadosBlog['titulo']; }
                                                        ?>
                                                        <figure class="def-90 m-top-15 m-left-5 w-800-100 m-top-800-0">
                                                            <a class="def-100" href="<?php echo URLRAIZ."/blog/".$idBlog."/".$dadosBlog['seo_link']; ?>" title="<?php echo $dadosBlog['titulo']; ?>">
                                                                <img class="def-100" src="<?php echo "blog/".$dadosBlogImagem['imagem']; ?>" alt="<?php echo $legenda; ?>" title="<?php echo $legenda; ?>" />
                                                            </a>
                                                        </figure>
                                                        <?php
                                                        }
                                                        }
                                                        ?>
                                                        <div class="def-90 m-left-5 m-top-15">
                                                            <div class="def-100 f-w-600 color-grey f-size-18">
                                                                <?php echo $dadosBlog['titulo']; ?>
                                                            </div>
                                                            <div class="def-100 m-top-15">
                                                                <div class="f-left c-left">
                                                                    <figure>
                                                                        <img src="<?php echo URLICON."calendar.png"; ?>" />
                                                                    </figure>
                                                                    <time class="m-top-3 m-left-10-px f-w-400 color-grey f-size-16">
                                                                        <?php echo mysql_to_data($dadosBlog['data']); ?>
                                                                    </time>
                                                                </div>
                                                                <div class="def-100 m-top-20">
                                                                    <a class="f-right bx-green b-radius-5 f-w-600 color-white f-size-12 see-more see-more-2" href="<?php echo URLRAIZ."/blog/".$idBlog."/".$dadosBlog['seo_link']; ?>" title="LEIA MAIS">
                                                                        LEIA MAIS
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php
                                                if($i == 2){
                                                    echo '<span class="def-100 none display-1024-block"></span>';
                                                }
                                                }
                                                ?>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </section>
            <aside class="def-30 bx-white f-right w-1024-50 f-1024-l m-left-1024-25 m-top-1024-30 w-800-100">
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
                    @if(!$tags->isEmpty())
                    <nav class="def-100 m-top-30 list-group-category">
                        <ul class="def-100">
                            <li class="def-100 title-category">
                                TAGS
                            </li>
                            @foreach($tags as $tag)
                            <li class="def-100">
                                <a href="{{ route('site.blog.tag', ['tag' => $tag->seo_link]) }}" title="{!! $tag->name !!}">
                                    - {!! $tag->name !!}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </nav>
                    @endif
                    @if(!$lastBlogs->isEmpty())
                    <nav class="def-100 m-top-30 list-group-category">
                        <ul class="def-100">
                            <li class="def-100 title-category">
                                ÚLTIMOS POSTS
                            </li>
                            @foreach($lastBlogs as $lastBlog)
                            <li class="def-100">
                                <a href="{{ route('site.blog.show', ['id' => $lastBlog->id, 'seoLink' => $lastBlog->seo_link]) }}" title="{!! $lastBlog->name !!}">
                                    - {!! $lastBlog->name !!}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </nav>
                    @endif
                    <figure class="def-100 m-top-50">
                        banner de anuncio cc
                        <img class="def-100" src="<?php echo "banner/main-banner.jpg"; ?>" />
                    </figure>
                </div>
            </aside>
        </div>
    </div>
@endsection