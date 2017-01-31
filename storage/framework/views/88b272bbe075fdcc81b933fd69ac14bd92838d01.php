<?php if(!isset($config['menu'])): ?>
<div class="site-menubar">
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu">
                    <li class="site-menu-category"><?php echo e(session()->get('name')); ?></li>
                    <li class="site-menu-item <?php if(isset($config['activeMenu']) && $config['activeMenu'] == 'home'): ?> active <?php endif; ?>">
                        <a class="animsition-link" href="<?php echo e(route('portal.home.index')); ?>">
                            <i class="site-menu-icon md-home" aria-hidden="true"></i>
                            <span class="site-menu-title">Home</span>
                        </a>
                    </li>
                    <li class="site-menu-item has-sub <?php if(isset($config['activeMenu']) && $config['activeMenu'] == 'condominium'): ?> active open <?php endif; ?>">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon icon wb-grid-9" aria-hidden="true"></i>
                            <span class="site-menu-title">Meu Condomínio</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <?php if(session()->get('admin') == 'y'): ?>
                            <li class="site-menu-item has-sub <?php if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'myCondominium'): ?> active open <?php endif; ?>">
                                <a href="javascript:void(0)">
                                    <span class="site-menu-title">Meu Condomínio</span>
                                    <span class="site-menu-arrow"></span>
                                </a>
                                <ul class="site-menu-sub">
                                    <li class="site-menu-item <?php if(isset($config['activeMenuN3']) && $config['activeMenuN3'] == 'block'): ?> active <?php endif; ?>">
                                        <a class="animsition-link" href="<?php echo e(route('portal.condominium.block.index')); ?>">
                                            <span class="site-menu-title">Blocos</span>
                                        </a>
                                    </li>
                                    <li class="site-menu-item <?php if(isset($config['activeMenuN3']) && $config['activeMenuN3'] == 'unit'): ?> active <?php endif; ?>">
                                        <a class="animsition-link" href="<?php echo e(route('portal.condominium.unit.index')); ?>">
                                            <span class="site-menu-title">Unidades</span>
                                        </a>
                                    </li>
                                    <li class="site-menu-item <?php if(isset($config['activeMenuN3']) && $config['activeMenuN3'] == 'garage'): ?> active <?php endif; ?>">
                                        <a class="animsition-link" href="<?php echo e(route('portal.condominium.unit.garage.index')); ?>">
                                            <span class="site-menu-title">Garagem</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <?php endif; ?>
                            <li class="site-menu-item <?php if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'user'): ?> active <?php endif; ?>">
                                <a class="animsition-link" href="<?php echo e(route('portal.condominium.user.index')); ?>">
                                    <span class="site-menu-title">Integrantes</span>
                                </a>
                            </li>
                            <li class="site-menu-item <?php if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'group'): ?> active <?php endif; ?>">
                                <a class="animsition-link" href="<?php echo e(route('portal.condominium.group.index')); ?>">
                                    <span class="site-menu-title">Grupos</span>
                                </a>
                            </li>
                            <li class="site-menu-item <?php if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'security-cam'): ?> active <?php endif; ?>">
                                <a class="animsition-link" href="<?php echo e(route('portal.condominium.security-cam.index')); ?>">
                                    <span class="site-menu-title">Câmeras de Segurança</span>
                                </a>
                            </li>
                            <?php if(session()->get('admin') == 'y'): ?>
                            <li class="site-menu-item <?php if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'provider'): ?> active <?php endif; ?>">
                                <a href="<?php echo e(route('portal.condominium.provider.index')); ?>">
                                    <span class="site-menu-title">Fornecedores</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="site-menu-item has-sub <?php if(isset($config['activeMenu']) && $config['activeMenu'] == 'manage'): ?> active open <?php endif; ?>">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon icon wb-users" aria-hidden="true"></i>
                            <span class="site-menu-title">Administração</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item <?php if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'contract'): ?> active <?php endif; ?>">
                                <a class="animsition-link" href="<?php echo e(route('portal.manage.contract.index')); ?>">
                                    <span class="site-menu-title">Contratos</span>
                                </a>
                            </li>
                            <li class="site-menu-item <?php if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'maintenance'): ?> active <?php endif; ?>">
                                <a class="animsition-link" href="<?php echo e(route('portal.manage.maintenance.index')); ?>">
                                    <span class="site-menu-title">Manutenções Preventivas</span>
                                </a>
                            </li>

                            <?php if(session()->get('admin') == 'y'): ?>
                            <li class="site-menu-item <?php if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'reserve-areas'): ?> active <?php endif; ?>">
                                <a class="animsition-link" href="<?php echo e(route('portal.manage.reserve-areas.index')); ?>">
                                    <span class="site-menu-title">Recursos Comuns</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="site-menu-item has-sub <?php if(isset($config['activeMenu']) && $config['activeMenu'] == 'communication'): ?> active open <?php endif; ?>">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon icon wb-chat-group" aria-hidden="true"></i>
                            <span class="site-menu-title">Comunicação</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item <?php if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'message'): ?> active <?php endif; ?>">
                                <a class="animsition-link" href="<?php echo e(route('portal.communication.message.public.index')); ?>">
                                    <span class="site-menu-title">Mensagens Públicas</span>
                                </a>
                            </li>
                            <li class="site-menu-item <?php if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'called'): ?> active <?php endif; ?>">
                                <a class="animsition-link" href="<?php echo e(route('portal.communication.called.index')); ?>">
                                    <span class="site-menu-title">Meus Chamados</span>
                                </a>
                            </li>
                            <li class="site-menu-item <?php if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'communication'): ?> active <?php endif; ?>">
                                <a class="animsition-link" href="<?php echo e(route('portal.communication.communication.index')); ?>">
                                    <span class="site-menu-title">Meus Comunicados</span>
                                </a>
                            </li>
                            <?php if(session()->get('admin') == 'y'): ?>
                            <li class="site-menu-item <?php if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'communication-condominium'): ?> active <?php endif; ?>">
                                <a class="animsition-link" href="<?php echo e(route('portal.communication.communication-condominium.index')); ?>">
                                    <span class="site-menu-title">Comunicados</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="site-menu-item has-sub <?php if(isset($config['activeMenu']) && $config['activeMenu'] == 'system'): ?> active open <?php endif; ?>">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
                            <span class="site-menu-title">Sistema</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item <?php if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'condominium'): ?> active <?php endif; ?>">
                                <a class="animsition-link" href="<?php echo e(route('portal.condominium.index')); ?>">
                                    <span class="site-menu-title">Meus Condomínios</span>
                                </a>
                            </li>
                            <?php if(session()->get('admin') == 'y'): ?>
                            <li class="site-menu-item <?php if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'approval'): ?> active <?php endif; ?>">
                                <a class="animsition-link" href="<?php echo e(route('portal.condominium.user.approval.all')); ?>">
                                    <span class="site-menu-title">Aprovação de Usuários</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                </ul>
                <div class="site-menubar-section">
                    <h5>
                        Perfil
                        <span class="pull-right">30%</span>
                    </h5>
                    <div class="progress progress-xs">
                        <div class="progress-bar active" style="width: 30%;" role="progressbar"></div>
                    </div>
                    <h5>
                        Condomínio
                        <span class="pull-right">60%</span>
                    </h5>
                    <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-warning" style="width: 60%;" role="progressbar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-menubar-footer">
        <a href="<?php echo e(route('portal.condominium.user.config', ['id' => session()->get('user_condominium_id')])); ?>" class="fold-show" data-placement="top" data-toggle="tooltip"
           data-original-title="Configurações">
            <span class="icon md-settings" aria-hidden="true"></span>
        </a>
        <a href="<?php echo e(url('logout')); ?>" data-placement="top" data-toggle="tooltip" data-original-title="Sair"
           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <span class="icon md-power" aria-hidden="true"></span>
        </a>
        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
            <?php echo e(csrf_field()); ?>

        </form>
    </div>
</div>
<?php endif; ?>