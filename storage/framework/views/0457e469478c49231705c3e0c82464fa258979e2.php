

<?php $__env->startSection('content'); ?>
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title"><?php echo e($config['title']); ?></h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="<?php echo e(route('portal.home.index')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('portal.communication.index')); ?>">Comunicação</a></li>
                <li class="active">Mensagens Públicas</li>
            </ol>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body">
                    <?php echo $__env->make('success._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('errors._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('portal.modals.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('portal.communication.message.public.modal.modal_create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('portal.communication.message.public.modal._comment', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <button title="Enviar Mensagem"
                            class="btn btn-primary waves-effect waves-light btnShowModal"
                            data-target="#modalCreateMessage" data-toggle="modal"
                            data-route="<?php echo e(route('portal.communication.message.public.create')); ?>">
                        <i class="icon wb-plus" aria-hidden="true"></i>
                        Enviar Mensagem
                    </button>

                    <?php if(!$dados->isEmpty()): ?>
                        <ul class="list-group">
                            <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <li class="list-group-item">
                                    <div class="media media-lg well padding-10">
                                        <div class="media-left">
                                            <a class="avatar" href="javascript:void(0)">
                                                <?php
                                                if($row->userCondominium->user->imagem){
                                                    $imgAvatar = route('portal.condominium.user.image', ['id' => $row->userCondominium->user->id, 'image' => $row->userCondominium->user->imagem]);
                                                }else{
                                                    $imgAvatar = asset('portal/global/portraits/1.jpg');
                                                }
                                                ?>
                                                <div class="avatar" style="height: 50px; background: url('<?php echo e($imgAvatar); ?>') top center; background-size: cover;"></div>
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                <?php echo e($row->subject); ?>

                                                <span><?php echo e($row->userCondominium->user->name); ?></span>
                                            </h4>
                                            <small><?php echo e(date('d/m/Y H:i:s', strtotime($row->created_at))); ?></small>
                                            <div class="media-body">
                                                <p><?php echo nl2br($row->message); ?></p>
                                                <button title="Comentar"
                                                        class="btn btn-icon bg-warning waves-effect waves-light btnComentarMsgPublic"
                                                        data-target="#modalComment" data-toggle="modal"
                                                        data-id="<?php echo e($row->id); ?>">
                                                    Responder
                                                </button>
                                                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('delete', $row)): ?>
                                                <button title="Excluir"
                                                        class="btn btn-icon bg-danger waves-effect waves-light btnDelete"
                                                        data-target="#modalDelete" data-toggle="modal"
                                                        data-route="<?php echo e(route('portal.communication.message.public.destroy', ['id' => $row->id])); ?>">
                                                    <i class="icon wb-trash" aria-hidden="true"></i>
                                                </button>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                    </div>
                                    <?php if($row->messageReply->toArray()): ?>
                                        <?php $__currentLoopData = $row->messageReply; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <div class="profile-brief margin-top-10">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <?php
                                                        if($reply->userCondominium->user->imagem){
                                                            $imgAvatar = route('portal.condominium.user.image', ['id' => $reply->userCondominium->user->id, 'image' => $reply->userCondominium->user->imagem]);
                                                        }else{
                                                            $imgAvatar = asset('portal/global/portraits/1.jpg');
                                                        }
                                                        ?>
                                                        <a class="avatar" href="javascript:void(0)" style="height: 50px; background: url('<?php echo e($imgAvatar); ?>') top center; background-size: cover;"></a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading"><?php echo e($reply->userCondominium->user->name); ?></h4>
                                                        <small><?php echo e(date('d/m/Y H:i:s', strtotime($reply->created_at))); ?></small>
                                                        <p>
                                                            <?php echo nl2br($reply->message); ?>

                                                            <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('delete', $reply)): ?>
                                                                <a class="btnDelete"
                                                                   data-target="#modalDelete" data-toggle="modal"
                                                                   data-id="<?php echo e($reply->id); ?>"
                                                                   data-route="<?php echo e(route('portal.communication.message.public.reply.destroy', ['id' => $reply->id])); ?>"
                                                                   href="javascript:void(0);"
                                                                   title="Excluir">Excluir</a>
                                                            <?php endif; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    <?php endif; ?>
                                </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </ul>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <?php echo $dados->setPath('')->appends(Request::except('page'))->render(); ?>

                            </div>
                        </div>
                    <?php else: ?>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h4 class="page-title">
                                    <br/>
                                    Nenhum mensagem pública até o momento.
                                </h4>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <button title="Enviar Mensagem"
            class="site-action site-floataction btn-raised btn btn-success btn-floating btnShowModal"
            data-target="#modalCreateMessage" data-toggle="modal"
            data-route="<?php echo e(route('portal.communication.message.public.create')); ?>">
            <i class="icon md-plus" aria-hidden="true"></i>
    </button>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.layouts.portal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>