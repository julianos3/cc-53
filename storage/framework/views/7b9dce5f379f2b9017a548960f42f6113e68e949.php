<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('name', 'Nome do Condomínio *'); ?>

            <?php echo Form::text('name', null, ['class'=>'form-control']); ?>

        </div>
    </div>
</div>

<div class="row">
    <?php if($dados['image']): ?>
        <div class="col-md-6 height-100">
            <a href="<?php echo e(route('portal.condominium.image', ['id' => $dados->id, 'image' => $dados['image']])); ?>" class="zoom-light-box" data-effect="mfp-zoom-in">
                <img class="img-responsive margin-right-15 height-100 img-thumbnail" src="<?php echo e(route('portal.condominium.image', ['id' => $dados->id, 'image' => $dados['image']])); ?>" />
            </a>
        </div>
    <?php endif; ?>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('image', 'Imagem de Perfil'); ?>

            <div class="input-group input-group-file">
                <input type="text" class="form-control" readonly="">
                <span class="input-group-btn">
                      <span class="btn btn-success btn-file waves-effect waves-light">
                        <i class="icon md-upload" aria-hidden="true"></i>
                        <input type="file" name="image" >
                      </span>
                </span>
                <p class="errors"><?php echo $errors->first('image'); ?></p>
                <?php if(Session::has('error')): ?>
                    <p class="errors"><?php echo Session::get('error'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<hr />

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
            <?php echo Form::label('cnpj', 'CNPJ *'); ?>

            <?php echo Form::text('cnpj', null, ['class'=>'form-control', 'data-plugin' => 'formatter', 'data-pattern' => '[[99]].[[999]].[[999]]/[[9999]]-[[99]]', 'placeholder' => '99.999.999/9999-99' ]); ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('zip_code', 'CEP *'); ?>

            <div class="input-group">
            <?php echo Form::text('zip_code', null, ['class'=>'form-control', 'id' => 'cep', 'required' => 'required', 'placeholder' => 'CEP', 'data-plugin' => 'formatter', 'data-pattern' => '[[99999]]-[[999]]']); ?>

                <span class="input-group-btn">
                    <button type="button" formtarget="_blank"
                            onclick="window.open('http://www.buscacep.correios.com.br/sistemas/buscacep/')"
                            data-toggle="tooltip"
                            data-original-title="Não sei meu CEP"
                            class="btn btn-warning waves-effect waves-light"
                            id="">
                        <i class="icon wb-search" aria-hidden="true"></i>
                        Buscar
                    </button>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('address', 'Logradouro *'); ?>

            <?php echo Form::text('address', null, ['class'=>'form-control', 'required' => 'required', 'placeholder' => 'Rua, Av..']); ?>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('number', 'Número *'); ?>

            <?php echo Form::text('number', null, ['class'=>'form-control', 'required' => 'required', 'placeholder' => '99']); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('district', 'Bairro *'); ?>

            <?php echo Form::text('district', null, ['class'=>'form-control', 'required' => 'required']); ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('complemento', 'Complemento'); ?>

            <?php echo Form::text('complement', null, ['class'=>'form-control']); ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label" for="uf">Estado</label>
            <select class="form-control" name="state_id" id="uf" required="required">
                <option value="">Selecione</option>
                <?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <option value="<?php echo e($row->id); ?>" <?php if($dados->city->state_id == $row->id): ?> selected <?php endif; ?>><?php echo e($row->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label" for="city">Cidade</label>
            <select class="form-control" name="city_id" id="city" required="required">
                <option value="">Selecione</option>
                <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <option value="<?php echo e($row->id); ?>" <?php if($dados->city_id == $row->id): ?> selected <?php endif; ?>><?php echo e($row->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </select>
        </div>
    </div>
</div>

<?php echo Form::hidden('route', 'edit', ['class'=>'form-control']); ?>

<?php echo Form::hidden('condominium_id', $dados->id); ?>