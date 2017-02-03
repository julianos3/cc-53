<div class="row">
    <div class="col-md-12">
        <div class="widget widget-shadow text-center">
            <div class="widget-header">
                <div class="widget-header-content">

                    <?php
                    if($dados->user->imagem){
                        $imgAvatar = route('portal.condominium.user.image', ['id' => $dados->user->id, 'image' => $dados->user->imagem]);
                    }else{
                        $imgAvatar = asset('portal/assets/images/user-not-image.jpg');
                    }
                    ?>
                    <?php if($imgAvatar): ?>
                        <a class="avatar avatar-lg" href="javascript:void(0);">
                            <img src="<?php echo e($imgAvatar); ?>" alt="<?php echo e($dados->user->name); ?>">
                        </a>
                    <?php endif; ?>
                    <h4 class="profile-user"><?php echo e($dados->user->name); ?></h4>
                    <p class="profile-job"><?php echo e($dados->userRoleCondominium->name); ?></p>
                    <p>
                        E-mail: <?php echo e($dados->user->email); ?><br/>
                        <?php if($dados->user->phone): ?>
                            Telefone: <?php echo e($dados->user->phone); ?><br/>
                        <?php endif; ?>
                        <?php if(isset($dados->user->cell_phone)): ?>
                            Celular: <?php echo e($dados->user->cell_phone); ?><br/>
                        <?php endif; ?>
                    </p>

                    <?php if($dados->user->twitter != '' || $dados->user->facebook != '' ||
                        $dados->user->instagram != '' || $dados->user->google_plus != '' || $dados->user->linkedin != ''): ?>
                        <div class="profile-social">
                            <?php if($dados->user->twitter != ''): ?>
                                <a class="icon bd-twitter" href="javascript:void(0)" target="_blank"
                                   title="Twitter"></a>
                            <?php endif; ?>
                            <?php if($dados->user->facebook != ''): ?>
                                <a class="icon bd-facebook" href="javascript:void(0)" target="_blank"
                                   title="Facebook"></a>
                            <?php endif; ?>
                            <?php if($dados->user->instagram != ''): ?>
                                <a class="icon bd-instagram" href="javascript:void(0)" target="_blank"
                                   title="Instagram"></a>
                            <?php endif; ?>
                            <?php if($dados->user->google_plus != ''): ?>
                                <a class="icon bd-google-plus" href="javascript:void(0)" target="_blank"
                                   title="Google Plus"></a>
                            <?php endif; ?>
                            <?php if($dados->user->linkedin != ''): ?>
                                <a class="icon bd-linkedin" href="javascript:void(0)" target="_blank"
                                   title="Linkedin"></a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php if(!$dados->user->description ||
            !$dados->user->formation ||
            !$dados->user->institution ||
            !$dados->user->conclusion ||
            !$dados->user->profession ||
            !$dados->user->company ||
            !$dados->userUnit->toArray()||
            !$dados->user->site): ?>
    <?php else: ?>
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="article-content">
                        <?php if($dados->user->description): ?>
                        <section>
                            <h4 id="section-1">Sobre mim:</h4>
                            <p><?php echo e($dados->user->description); ?></p>
                        </section>
                        <?php endif; ?>

                        <?php if($dados->user->formation != '' && $dados->user->institution && $dados->user->conclusion): ?>
                        <section>
                            <h5 id="section-2">Escolaridade</h5>
                            <p>
                                Formação: <?php echo e($dados->user->formation); ?><br />
                                Instituição: <?php echo e($dados->user->institution); ?><br />
                                Conclusão: <?php echo e($dados->user->conclusion); ?>

                            </p>
                        </section>
                        <?php endif; ?>

                        <?php if($dados->user->profession && $dados->user->company): ?>
                        <section>
                            <h5 id="section-2">Profissional</h5>
                            <p>
                                Profissão: <?php echo e($dados->user->profession); ?><br />
                                Empresa: <?php echo e($dados->user->company); ?>

                            </p>
                        </section>
                        <?php endif; ?>

                        <?php if($dados->userUnit->toArray()): ?>
                            <section>
                                <h5 id="section-2">Unidades</h5>
                                <p>
                                    <?php
                                    $cont = 0;
                                    foreach ($dados->userUnit as $unit) {
                                        $cont++;
                                        if ($cont > 1) {
                                            echo '<br />';
                                        }
                                        echo $unit->unit->name . ' - ' . $unit->unit->block->name;
                                    }
                                    ?>
                                </p>
                            </section>
                        <?php endif; ?>

                        <?php if($dados->user->site): ?>
                        <p>
                            <strong>Website ou blog:</strong><br />
                            <a href="<?php echo e($dados->user->site); ?>" target="_blank" title="<?php echo e($dados->user->site); ?>"><?php echo e($dados->user->site); ?></a>
                        </p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>