

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
                            Preencha as demais informações sobre do seu condomínio.
                        </p>
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
                                        <div class="step col-md-3 current" data-target="#info" role="tab">
                                            <span class="step-number">2</span>
                                            <div class="step-desc">
                                                <span class="step-title">Informações</span>
                                                <p>Informações do meu condomínio</p>
                                            </div>
                                        </div>
                                        <div class="step col-md-3" data-target="#config" role="tab">
                                            <span class="step-number">3</span>
                                            <div class="step-desc">
                                                <span class="step-title">Configurar</span>
                                                <p>Configuração de unidades do condomínio</p>
                                            </div>
                                        </div>
                                        <div class="step col-md-3" data-target="#conclusao" role="tab">
                                            <span class="step-number">4</span>
                                            <div class="step-desc">
                                                <span class="step-title">Conclusão</span>
                                                <p>Verificação dos dados cadastrados</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wizard-content">
                                        <div class="wizard-pane active" id="info" role="tabpanel">
                                            <form id="formCondominium" method="post"
                                                  action="<?php echo e(route('portal.condominium.update.info', ['id' => $dados['id']])); ?>">
                                                <?php echo csrf_field(); ?>

                                                <?php echo $__env->make('errors._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="name">Nome do
                                                                Condomínio</label>
                                                            <input type="text" class="form-control" id="name"
                                                                   name="name" value="<?php echo e($dados['name']); ?>"
                                                                   required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label"
                                                                   for="finality_id">Finalidade</label>
                                                            <select class="form-control" name="finality_id"
                                                                    id="finality_id" required="required">
                                                                <option value="">Selecione</option>
                                                                <?php $__currentLoopData = $finality; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                    <option value="<?php echo e($row->id); ?>"
                                                                            <?php if($row['id'] === $dados['finality_id']): ?> selected <?php endif; ?>><?php echo e($row->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="cnpj">CNPJ</label>
                                                            <input type="text" class="form-control" id="cnpj"
                                                                   name="cnpj" data-plugin="formatter"
                                                                   value="<?php echo e($dados['cnpj']); ?>"
                                                                   data-pattern="[[99]].[[999]].[[999]]/[[9999]]-[[99]]"
                                                                   placeholder="99.999.999/9999-99">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-6 text-left">
                                                        <a href="<?php echo e(route('portal.condominium.edit', ['id' => $dados->id])); ?>"
                                                           class="btn btn-success"
                                                           data-toggle="tooltip"
                                                           data-original-title="Voltar">
                                                            <i class="icon wb-arrow-left" aria-hidden="true"></i>
                                                            Voltar
                                                        </a>
                                                    </div>
                                                    <div class="col-xs-6 text-right">
                                                        <button type="submit" class="btn btn-success"
                                                                data-toggle="tooltip"
                                                                data-original-title="Avançar">
                                                                Avançar
                                                            <i class="icon wb-arrow-right" aria-hidden="true"></i>
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