<div class="row">
    <?php if($dados['imagem']): ?>
    <div class="col-md-6 height-100">
        <img class="img-responsive margin-right-15 height-100 img-thumbnail" src="<?php echo e(route('portal.condominium.user.image', ['id' => $dados->id, 'imagem' => $dados['imagem']])); ?>" />
        <a href="<?php echo e(route('portal.condominium.user.image', ['id' => $dados->id, 'imagem' => $dados['imagem']])); ?>" target="_blank">Visualizar Imagem</a>
    </div>
    <?php endif; ?>
    <div class="col-md-6">
        <div class="control-group">
            <div class="controls">
                <?php echo Form::file('imagem'); ?>

                <p class="errors"><?php echo $errors->first('imagem'); ?></p>
                <?php if(Session::has('error')): ?>
                    <p class="errors"><?php echo Session::get('error'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<hr />

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('Name', 'Nome: *'); ?>

            <?php echo Form::text('name', null, ['class'=>'form-control', 'required' => 'required']); ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('Email', 'E-mail: *'); ?>

            <?php echo Form::text('email', null, ['class'=>'form-control', 'required' => 'required']); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label" for="user_role_condominium_id">Tipo de relação com o condoḿinio: *</label>
            <select class="form-control" name="user_role_condominium_id" id="user_role_condominium_id" required="required">
                <option value="">Selecione</option>
                <?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <option value="<?php echo e($row->id); ?>" <?php if($row->id == $userRoleCondominium && isset($userRoleCondominium)): ?> selected <?php endif; ?>><?php echo e($row->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('description', 'Sobre mim:'); ?>

            <?php echo Form::textarea('description', null, ['class'=>'form-control']); ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('phone', 'Telefone:'); ?>

            <?php echo Form::text('phone', null, ['class'=>'form-control', 'data-plugin' => 'formatter', 'data-pattern' => '([[99]]) [[99999]]-[[9999]]', 'placeholder' => '(99) 99999-9999']); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('cell_phone', 'Celular: *'); ?>

            <?php echo Form::text('cell_phone', null, ['class'=>'form-control', 'data-plugin' => 'formatter', 'data-pattern' => '([[99]]) [[99999]]-[[9999]]', 'placeholder' => '(99) 99999-9999', 'required' => 'required']); ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('birth', 'Data de Nascimento: *'); ?>

            <?php echo Form::text('birth', null, ['class'=>'form-control', 'data-plugin' => 'formatter', 'data-pattern' => '[[99]]/[[99]]/[[9999]]', 'placeholder' => '99/99/9999', 'requried' => 'required']); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('cpf', 'CPF:'); ?>

            <?php echo Form::text('cpf', null, ['class'=>'form-control', 'data-plugin' => 'formatter', 'data-pattern' => '[[999]].[[999]].[[999]]-[[99]]', 'placeholder' => '999.999.999-99']); ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('marital_status', 'Estado Cívil: *'); ?>

            <?php echo Form::select('marital_status', [
                'Solteiro' => 'Solteiro',
                'Casado' => 'Casado',
                'Divorciado' => 'Divorciado',
                'Viúvo' => 'Viúvo',
                'Separado' => 'Separado',
                'Companheiro' => 'Companheiro'
            ], null, ['class'=>'form-control', 'required' => 'required']); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('Sexo', 'Sexo: *'); ?>

            <?php echo Form::select('sex', ['m' => 'Masculino','f' => 'Feminino'], null, ['class'=>'form-control', 'required' => 'required']); ?>

        </div>
    </div>
</div>

<hr/>
<h4>Escolaridade</h4>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <?php echo Form::label('formation', 'Formação:'); ?>

            <?php echo Form::text('formation', null, ['class'=>'form-control']); ?>

        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <?php echo Form::label('institution', 'Instituição:'); ?>

            <?php echo Form::text('institution', null, ['class'=>'form-control']); ?>

        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <?php echo Form::label('conclusion', 'Conclusão:'); ?>

            <?php echo Form::text('conclusion', null, ['class'=>'form-control']); ?>

        </div>
    </div>
</div>

<hr/>
<h4>Profissional</h4>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('profession', 'Profissão:'); ?>

            <?php echo Form::text('profession', null, ['class'=>'form-control']); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('company', 'Empresa:'); ?>

            <?php echo Form::text('company', null, ['class'=>'form-control']); ?>

        </div>
    </div>
</div>

<hr/>
<h4>Minhas redes</h4>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('facebook', 'Facebook:'); ?>

            <?php echo Form::text('facebook', null, ['class'=>'form-control']); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('twitter', 'Twitter:'); ?>

            <?php echo Form::text('twitter', null, ['class'=>'form-control']); ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('linkedin', 'LinkedIn:'); ?>

            <?php echo Form::text('linkedin', null, ['class'=>'form-control']); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('google_plus', 'Google Plus:'); ?>

            <?php echo Form::text('google_plus', null, ['class'=>'form-control']); ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('instagram', 'Instagram:'); ?>

            <?php echo Form::text('instagram', null, ['class'=>'form-control']); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('snapchat', 'Snapchat:'); ?>

            <?php echo Form::text('snapchat', null, ['class'=>'form-control']); ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('site', 'Website ou blog:'); ?>

            <?php echo Form::text('site', null, ['class'=>'form-control', 'placeholder' => 'http://www.centralcondo.com.br']); ?>

        </div>
    </div>
</div>

<input type="hidden" value="<?php echo e($dados->user_role_id); ?>" name="user_role_id" />
