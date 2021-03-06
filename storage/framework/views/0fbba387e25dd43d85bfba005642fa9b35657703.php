

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
                            Configurações das unidades do seu condomínio.
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
                                        <div class="step col-md-3 current" data-target="#config" role="tab">
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
                                        <div class="wizard-pane active" id="config" role="tabpanel">
                                            <form id="formUnit" method="post"
                                                  action="<?php echo e(route('portal.condominium.create.unit', ['id' => $dados['id']])); ?>">
                                                <?php echo csrf_field(); ?>

                                                <?php echo $__env->make('errors._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                <?php echo $__env->make('success._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="unit_type_id">Tipo de
                                                                Unidade</label>
                                                            <select class="form-control" name="unit_type_id"
                                                                    id="unit_type_id" required="required">
                                                                <option value="">Selecione</option>
                                                                <?php $__currentLoopData = $unitType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                    <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- GARAGEM -->
                                                <div class="row garagem none">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="number_garagem">Número de
                                                                vagas de Garagem:</label>
                                                            <input type="text" class="form-control" id="number_garagem"
                                                                   name="number_garagem" required="required">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- CASA -->
                                                <div class="row casa none">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="casa_ini">Casa
                                                                inicial:</label>
                                                            <input type="text" class="form-control" id="casa_ini"
                                                                   name="casa_ini" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="casa_fim">Casa
                                                                Final:</label>
                                                            <input type="text" class="form-control" id="casa_fim"
                                                                   name="casa_fim" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- APARTAMENTO -->
                                                <div class="row apartamento none">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="unidade_andar">Número de
                                                                unidades por andar:</label>
                                                            <input type="text" class="form-control" id="unidade_andar"
                                                                   name="unidade_andar" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="numero_andar">Número de
                                                                andares com unidades:</label>
                                                            <input type="text" class="form-control" id="numero_andar"
                                                                   name="number_andar" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row apartamento none">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="number_init">Númeração
                                                                inicial:</label>
                                                            <input type="text" class="form-control" id="number_init"
                                                                   name="number_init" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row apartamento casa none">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="qtde_block">Quantidade de
                                                                Blocos</label>
                                                            <input type="text" class="form-control" id="qtde_block"
                                                                   name="qtde_block">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="block_nomemclature_id">Nomemclatura
                                                                dos Blocos</label>
                                                            <select class="form-control" name="block_nomemclature_id"
                                                                    id="block_nomemclature_id" required="required">
                                                                <option value="">Selecione</option>
                                                                <?php $__currentLoopData = $blockNomemclature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                    <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 text-right">
                                                        <button type="submit" class="btn btn-dark margin-bottom-20"
                                                                data-toggle="tooltip"
                                                                data-original-title="Adicionar">
                                                            <i class="icon wb-plus" aria-hidden="true"></i>
                                                            Adicionar Unidades
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>

                                            <?php if(!$unit->isEmpty()): ?>
                                                <div class="row">
                                                    <div class="col-md-12 text-right">
                                                        <br/>
                                                        <a href="<?php echo e(route('portal.condominium.unitBlockClear')); ?>"
                                                           class="btn btn-danger"
                                                           data-toggle="tooltip"
                                                           data-original-title="Limpar">
                                                            <i class="icon wb-trash" aria-hidden="true"></i>
                                                            Limpar Unidades
                                                        </a>
                                                        <br/><br/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="tablesaw table-striped table-bordered table-hover"
                                                               data-tablesaw-mode="swipe"
                                                               data-tablesaw-sortable data-tablesaw-minimap>
                                                            <thead>
                                                                <tr>
                                                                    <th data-tablesaw-sortable-col
                                                                        data-tablesaw-sortable-default-col
                                                                        data-tablesaw-priority="persist">Tipo
                                                                    </th>
                                                                    <th data-tablesaw-sortable-col
                                                                        data-tablesaw-priority="3">Bloco
                                                                    </th>
                                                                    <th data-tablesaw-sortable-col
                                                                        data-tablesaw-priority="2">Unidade
                                                                    </th>
                                                                    <th data-tablesaw-sortable-col
                                                                        data-tablesaw-priority="1">
                                                                        <abbr title="Andar">Andar</abbr>
                                                                    </th>
                                                                    <th data-tablesaw-sortable-col
                                                                        data-tablesaw-priority="4" class="text-center col-md-2">Ação
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php $__currentLoopData = $unit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo e($row->unitType->name); ?></td>
                                                                    <td><?php echo e($row->block->name); ?></td>
                                                                    <td><?php echo e($row->name); ?></td>
                                                                    <td><?php if($row->floor): ?> <?php echo e($row->floor); ?> <?php else: ?> - <?php endif; ?></td>
                                                                    <td>
                                                                        <a href="<?php echo e(route('portal.condominium.unit.destroy',['id'=>$row->id])); ?>" title="Excluir" class="btn btn-icon bg-danger waves-effect waves-light btnDelete waves-effect waves-light">
                                                                            <i class="icon wb-trash" aria-hidden="true"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 text-right">
                                                        <br/>
                                                        <a href="<?php echo e(route('portal.condominium.unitBlockClear')); ?>"
                                                           class="btn btn-danger"
                                                           data-toggle="tooltip"
                                                           data-original-title="Limpar">
                                                            <i class="icon wb-trash" aria-hidden="true"></i>
                                                            Limpar Unidades
                                                        </a>
                                                        <br/><br/>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <hr />
                                            <div class="row">
                                                <div class="col-xs-6 text-left">
                                                    <a href="<?php echo e(route('portal.condominium.create.info')); ?>"
                                                       class="btn btn-success"
                                                       data-toggle="tooltip"
                                                       data-original-title="Voltar">
                                                        <i class="icon wb-arrow-left" aria-hidden="true"></i>
                                                        Voltar
                                                    </a>
                                                </div>
                                                <?php if(!$unit->isEmpty()): ?>
                                                <div class="col-xs-6 text-right">
                                                    <a href="<?php echo e(route('portal.condominium.create.finish')); ?>"
                                                       class="btn btn-success" data-toggle="tooltip"
                                                       data-original-title="Avançar">
                                                        Avançar
                                                        <i class="icon wb-arrow-right" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                                <?php else: ?>
                                                    <div class="col-xs-6 text-right">
                                                        <button disabled
                                                           class="btn btn-success" data-toggle="tooltip"
                                                           data-original-title="Avançar">
                                                            Avançar
                                                            <i class="icon wb-arrow-right" aria-hidden="true"></i>
                                                        </button>
                                                        <br /><br />
                                                        <p class="alert-info text-center">Informar as unidades do condomínio.</p>
                                                    </div>
                                                <?php endif; ?>
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
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.layouts.portal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>