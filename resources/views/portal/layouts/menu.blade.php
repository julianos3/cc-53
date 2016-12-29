@if(!isset($config['menu']))
<div class="site-menubar">
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu">
                    <li class="site-menu-category">{{ session()->get('name') }}</li>
                    <li class="site-menu-item">
                        <a class="animsition-link" href="{{ route('portal.home.index') }}">
                            <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                            <span class="site-menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon icon wb-grid-9" aria-hidden="true"></i>
                            <span class="site-menu-title">Meu Condomínio</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            @if(session()->get('admin') == 'y')
                            <li class="site-menu-item has-sub">
                                <a href="javascript:void(0)">
                                    <span class="site-menu-title">Meu Condomínio</span>
                                    <span class="site-menu-arrow"></span>
                                </a>
                                <ul class="site-menu-sub">
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href="{{ route('portal.condominium.block.index') }}">
                                            <span class="site-menu-title">Blocos</span>
                                        </a>
                                    </li>
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href="{{ route('portal.condominium.unit.index') }}">
                                            <span class="site-menu-title">Unidades</span>
                                        </a>
                                    </li>
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href="{{ route('portal.condominium.unit.garage.index') }}">
                                            <span class="site-menu-title">Garagem</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endif
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('portal.condominium.user.index') }}">
                                    <span class="site-menu-title">Integrantes</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('portal.condominium.group.index') }}">
                                    <span class="site-menu-title">Grupos</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('portal.condominium.security-cam.index') }}">
                                    <span class="site-menu-title">Câmeras de Segurança</span>
                                </a>
                            </li>
                            @if(session()->get('admin') == 'y')
                            <li class="site-menu-item">
                                <a href="{{ route('portal.condominium.provider.index') }}">
                                    <span class="site-menu-title">Fornecedores</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon icon wb-users" aria-hidden="true"></i>
                            <span class="site-menu-title">Administração</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('portal.manage.contract.index') }}">
                                    <span class="site-menu-title">Contratos</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('portal.manage.maintenance.index') }}">
                                    <span class="site-menu-title">Manutenções Preventivas</span>
                                </a>
                            </li>

                            @if(session()->get('admin') == 'y')
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('portal.manage.reserve-areas.index') }}">
                                    <span class="site-menu-title">Recursos Comuns</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    <!-- active open -->
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon icon wb-chat-group" aria-hidden="true"></i>
                            <span class="site-menu-title">Comunicação</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('portal.communication.message.public.index') }}">
                                    <span class="site-menu-title">Mensagens Públicas</span>
                                </a>
                            </li>
                            <li class="site-menu-item none">
                                <a class="animsition-link" href="{{ route('portal.communication.message.private.index') }}">
                                    <span class="site-menu-title">Mensagens Privadas</span>
                                </a>
                            </li>
                            <li class="site-menu-item none">
                                <a class="animsition-link" href="">
                                    <span class="site-menu-title">Eventos</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('portal.communication.called.index') }}">
                                    <span class="site-menu-title">Meus Chamados</span>
                                </a>
                            </li>
                            <li class="site-menu-item none">
                                <a class="animsition-link" href="">
                                    <span class="site-menu-title">Fórum</span>
                                </a>
                            </li>
                            <li class="site-menu-item none">
                                <a class="animsition-link" href="">
                                    <span class="site-menu-title">Assembleias</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('portal.communication.communication.index') }}">
                                    <span class="site-menu-title">Comunicados</span>
                                </a>
                            </li>
                            <li class="site-menu-item none">
                                <a class="animsition-link" href="">
                                    <span class="site-menu-title">Achados e Perdidos</span>
                                </a>
                            </li>
                            <li class="site-menu-item none">
                                <a class="animsition-link" href="">
                                    <span class="site-menu-title">Enquetes</span>
                                </a>
                            </li>
                            <li class="site-menu-item none">
                                <a class="animsition-link" href="">
                                    <span class="site-menu-title">Álbum de Fotos</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
                            <span class="site-menu-title">Sistema</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('portal.condominium.index') }}">
                                    <span class="site-menu-title">Meus Condomínios</span>
                                </a>
                            </li>
                            @if(session()->get('admin') == 'y')
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('portal.condominium.user.approval.all') }}">
                                    <span class="site-menu-title">Aprovação de Usuários</span>
                                </a>
                            </li>
                            @endif
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
        <a href="javascript: void(0);" class="fold-show" data-placement="top" data-toggle="tooltip"
           data-original-title="Configurações">
            <span class="icon md-settings" aria-hidden="true"></span>
        </a>
        <a href="{{ url('logout') }}" data-placement="top" data-toggle="tooltip" data-original-title="Sair"
           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <span class="icon md-power" aria-hidden="true"></span>
        </a>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
</div>
@endif