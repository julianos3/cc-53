

<?php $__env->startSection('content'); ?>
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title"><?php echo e($config['title']); ?></h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="<?php echo e(route('portal.home.index')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('portal.condominium.index')); ?>">Condomínio</a></li>
                <li class="active">Cadastrar</li>
            </ol>
        </div>
        <div class="page-content container-fluid">
            <div class="panel">
                <div class="panel-body">
                    <div role="alert" class="alert dark alert-info alert-icon alert-dismissible">
                        <i class="icon md-notifications" aria-hidden="true"></i>
                        <h4>Atenção</h4>
                        <p>
                            Informe o endereço do seu condomínio para se comunicar.
                        </p>
                    </div>
                    <div class="alert alert-alt alert-warning alert-dismissible" role="alert">
                        <?php echo e($dados['name']); ?><br/>
                        Endereço: <?php echo e($dados['address'].', '.$dados['number'].' - '.$dados['district'].' - '.$dados->city->name.'/'.$dados->city->state->uf); ?>

                        <br/>
                        CEP: <?php echo e($dados['zip_code']); ?><br/>
                        Uso: <?php echo e($dados->finality->name); ?><br/>
                        Cadastrado em: <?php echo e($dados['created_at']); ?><br/>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <!-- Steps -->
                                    <div class="steps steps-sm row" data-plugin="matchHeight" data-by-row="true"
                                         role="tablist">
                                        <div class="step col-md-3 done" data-target="#addressCondominium" role="tab">
                                            <span class="step-number">1</span>
                                            <div class="step-desc">
                                                <span class="step-title">Localizar</span>
                                                <p>Endereço do seu condomínio</p>
                                            </div>
                                        </div>
                                        <div class="step col-md-3 done" data-target="#info" role="tab">
                                            <span class="step-number">2</span>
                                            <div class="step-desc">
                                                <span class="step-title">Informações</span>
                                                <p>Informações do meu condomínio</p>
                                            </div>
                                        </div>
                                        <div class="step col-md-3 done" data-target="#config" role="tab">
                                            <span class="step-number">3</span>
                                            <div class="step-desc">
                                                <span class="step-title">Configurar</span>
                                                <p>Configuração de unidades do condomínio</p>
                                            </div>
                                        </div>
                                        <div class="step col-md-3 current" data-target="#conclusao" role="tab">
                                            <span class="step-number">4</span>
                                            <div class="step-desc">
                                                <span class="step-title">Conclusão</span>
                                                <p>Verificação dos dados cadastrados</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wizard-content">
                                        <div class="wizard-pane active" id="config" role="tabpanel">
                                            <form id="formUnit" method="post"
                                                  action="<?php echo e(route('portal.condominium.create.finish')); ?>">
                                                <?php echo csrf_field(); ?>

                                                <?php echo $__env->make('errors._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                <?php echo $__env->make('success._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="user_role_condominium_id">Minha
                                                                relação com este condomínio</label>
                                                            <select class="form-control" name="user_role_condominium_id"
                                                                    id="user_role_condominium_id" required="required">
                                                                <option value="">Selecione</option>
                                                                <?php $__currentLoopData = $userRole; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                    <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <h4 class="title">Caso possua alguma unidade do codomínio preencha
                                                    abaixo:</h4>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="block_id">Bloco</label>
                                                            <select class="form-control" name="block_id" id="block_id">
                                                                <option value="">Selecione</option>
                                                                <?php $__currentLoopData = $block; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                    <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="unit_id">Unidade</label>
                                                            <select class="form-control" name="unit_id" id="unit_id">
                                                                <option value="">Selecione</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="user_unit_role_id">Minha
                                                                relação com esta unidade</label>
                                                            <select class="form-control" name="user_unit_role_id"
                                                                    id="user_unit_role_id">
                                                                <option value="">Selecione</option>
                                                                <?php $__currentLoopData = $userUnitRole; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                    <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <?php if(session()->get('finish') != 'y'): ?>
                                                    <div class="col-xs-6 text-left">
                                                        <a href="<?php echo e(route('portal.condominium.create.config')); ?>"
                                                           class="btn btn-success"
                                                           data-toggle="tooltip"
                                                           data-original-title="Voltar">
                                                            <i class="icon wb-arrow-left" aria-hidden="true"></i>
                                                            Voltar
                                                        </a>
                                                    </div>
                                                    <?php endif; ?>
                                                    <div class="<?php if(session()->get('finish') != 'y'): ?> col-xs-6 <?php else: ?> col-xs-12 <?php endif; ?> text-right">
                                                        <button type="submit" class="btn btn-success"
                                                                data-toggle="tooltip"
                                                                data-original-title="Finalizar">
                                                            <i class="icon wb-check" aria-hidden="true"></i>
                                                            Finalizar
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.layouts.portal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>