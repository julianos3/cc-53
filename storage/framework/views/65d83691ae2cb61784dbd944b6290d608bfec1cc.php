<?php $__env->startSection('content'); ?>
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
            <section class="def-65 w-1024-100">
                <nav class="def-100">
                    <?php if(isset($blogs)): ?>
                    <ul class="def-100">
                        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li class="def-100 m-top-30">
                            <div class="def-100 p-bottom-30 bx-white border-grey-2">


                                <?php
                                $image = '';
                                $cover = '';
                                $urlBlog = route('site.blog.show', ['seoLink' => $blog->seo_link, 'id' => $blog->id]);
                                if($blog->images){
                                    foreach($blog->images as $image){
                                        if($image->cover == 'y'){
                                            $cover = asset('uploads/blog/'.$image->image);
                                        }
                                    }
                                    if($cover != ''){
                                        //$image = '<figure class="def-100"><img class="def-100" height="180px" title="'.$new->name.'" alt="'.$new->name.'" src="'.$cover.'" /></figure>';
                                        $image = '<figure class="def-90 m-top-30 m-left-5 w-800-100 m-top-800-0" style="background: url('.$cover.') center center; background-size: cover; height: 315px;"></figure>';
                                    }
                                }

                                ?>
                                <?php if(isset($image)): ?>
                                <a class="def-100" href="<?php echo $urlBlog; ?>" title="<?php echo $blog->name; ?>">
                                    <?php echo $image; ?>

                                </a>
                                <?php endif; ?>
                                <div class="def-90 m-left-5 m-top-30">
                                    <div class="def-100 f-w-600 color-grey f-size-24">
                                        <?php echo $blog->name; ?>

                                    </div>
                                    <div class="def-100 m-top-30">
                                        <div class="f-left c-left">
                                            <figure>
                                                <img src="<?php echo e(asset('site/images/icons/calendar.png')); ?>" />
                                            </figure>
                                            <time class="m-top-3 m-left-10-px f-w-400 color-grey f-size-16">
                                                <?php echo date('d/m/Y', strtotime($blog->date)); ?>

                                            </time>
                                        </div>
                                        <div class="def-100 def-text m-top-30">
                                            <p><?php echo str_limit(strip_tags($blog->description), 240); ?></p>
                                        </div>
                                        <div class="def-100 m-top-30">
                                            <a class="f-right bx-green b-radius-5 f-w-600 color-white f-size-14 see-more" href="<?php echo $urlBlog; ?>" title="LEIA MAIS">
                                                LEIA MAIS
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                    <?php else: ?>
                    Nenhum post cadastrado até o momento
                    <?php endif; ?>
                </nav>
                <div class="def-100 m-top-60 t-align-c m-top-1024-30">
                    <a class="b-radius-5 f-w-600 color-grey f-size-16 border-grey smooth see-more f-1024-l w-600-100" href="" title="CARREGAR MAIS">CARREGAR MAIS</a>
                </div>
            </section>
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
                    <?php if(!$tags->isEmpty()): ?>
                    <nav class="def-100 m-top-30 list-group-category">
                        <ul class="def-100">
                            <li class="def-100 title-category">
                                TAGS
                            </li>
                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <li class="def-100">
                                <a href="<?php echo e(route('site.blog.tag', ['tag' => $tag->seo_link])); ?>" title="<?php echo $tag->name; ?>">
                                    - <?php echo $tag->name; ?>

                                </a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </ul>
                    </nav>
                    <?php endif; ?>
                    <figure class="def-100 m-top-50">
                        banner de anuncio cc
                        <img class="def-100" src="<?php echo e(asset('upload/banner/main-banner.jpg')); ?>" />
                    </figure>
                </div>
            </aside>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.layouts.site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>