<?php if(session()->get('subscription_id')): ?>
    <?php if(!$condominium->subscribed(session()->get('subscription_name'))): ?>

        <?php if(session()->get('admin') == 'y'): ?>
            <div class="col-md-12">
                <div class="alert alert-info alert-icon alert-dismissible" role="alert">
                    <i class="icon md-notifications" aria-hidden="true"></i>
                    <h4>Aviso importante!</h4>
                    <p>
                        A assinatua do condomínio <?php echo e(session()->get('name')); ?> expirou no dia <strong><?php echo e(date('d/m/Y', strtotime(session()->get('ends_at')))); ?></strong>.<br />
                    </p>
                    <p class="margin-top-10">
                        <a href="<?php echo e(route('portal.condominium.subscriptions.index')); ?>" class="btn btn-info waves-effect waves-light" type="button">
                            <i class="icon wb-payment" aria-hidden="true"></i>
                            Renovar assinatura
                        </a>
                    </p>
                </div>
            </div>
        <?php else: ?>
            <div class="col-md-12">
                <div class="alert alert-warning alert-icon alert-dismissible" role="alert">
                    <i class="icon md-notifications" aria-hidden="true"></i>
                    <h4>Aviso importante!</h4>
                    <p>
                        A assinatua do condomínio <?php echo e(session()->get('name')); ?> expirou no dia <strong><?php echo e(date('d/m/Y', strtotime(session()->get('ends_at')))); ?></strong>.<br />
                    </p>
                    <p>Entre em contato com o responsável do seu condomínio para reativar a assinatura.</p>
                </div>
            </div>
        <?php endif; ?>

        <!--
        se for sindico mostra mensagem com botão para assinatura<br />
        se for condomino mostra mensagem para entra em contato com o sindico e verificar a assinatura do condominio<br />
        ASSINATUA EXPIRADA OU CANCELADA
        -->
    <?php endif; ?>
<?php elseif($condominium->onGenericTrial()): ?>
    <?php if(session()->get('admin') == 'y'): ?>
        <div class="col-md-12">
            <div class="alert alert-info alert-icon alert-dismissible" role="alert">
                <i class="icon md-notifications" aria-hidden="true"></i>
                <h4>Aviso importante!</h4>
                <p>
                    A Validade de sua assinatura de teste expira no dia <strong><?php echo e(date('d/m/Y', strtotime($condominium->trial_ends_at))); ?></strong>
                </p>
                <p class="margin-top-10">
                    <a href="<?php echo e(route('portal.condominium.subscriptions.index')); ?>" class="btn btn-info waves-effect waves-light" type="button">
                        <i class="icon wb-payment" aria-hidden="true"></i>
                        Assinar agora
                    </a>
                </p>
            </div>
        </div>
    <?php endif; ?>
<?php else: ?>
    <?php if(session()->get('admin') == 'y'): ?>
        <div class="col-md-12">
            <div class="alert alert-info alert-icon alert-dismissible" role="alert">
                <i class="icon md-notifications" aria-hidden="true"></i>
                <h4>Aviso importante!</h4>
                <p>
                    A Validade de sua assinatura expirou no dia <strong><?php echo e(date('d/m/Y', strtotime($condominium->trial_ends_at))); ?></strong>, para continuar utilizando todos os recursos do Central Condo assine agora.
                </p>
                <p class="margin-top-10">
                    <a href="<?php echo e(route('portal.condominium.subscriptions.index')); ?>" class="btn btn-info waves-effect waves-light" type="button">
                        <i class="icon wb-payment" aria-hidden="true"></i>
                        Assinar agora
                    </a>
                </p>
            </div>
        </div>
    <?php else: ?>
    <div class="col-md-12">
        <div class="alert alert-warning alert-icon alert-dismissible" role="alert">
            <i class="icon md-notifications" aria-hidden="true"></i>
            <h4>Aviso importante!</h4>
            <p>
                A assinatua do condomínio <?php echo e(session()->get('name')); ?> de teste expirou no dia <strong><?php echo e(date('d/m/Y', strtotime(session()->get('trial_ends_at')))); ?></strong>.<br />
            </p>
            <p>Entre em contato com o responsável do seu condomínio para ativar a assinatura.</p>
        </div>
    </div>
    <?php endif; ?>
<?php endif; ?>

<?php //dd(session()->get('subscription_id')); ?>