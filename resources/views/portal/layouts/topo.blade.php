<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided"
                data-toggle="menubar">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse"
                data-toggle="collapse">
            <i class="icon md-more-horizontal" aria-hidden="true"></i>
        </button>
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
            <a href="{{ url('portal/home') }}">
                <img class="navbar-brand-logo" src="{{ asset('portal/assets/images/logo.png') }}" title="Central Condo">
            </a>
        </div>
    </div>
    <div class="navbar-container container-fluid">
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                <li class="dropdown">
                    <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
                       data-animation="scale-up" role="button">
                        <span class="avatar avatar-online">
                        <img src="{{ session()->get('image') }}" alt="{{ Auth::user()->name }}" title="{{ Auth::user()->name }}">
                        <i></i>
                      </span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation">
                            <a href="{{ route('portal.condominium.user.edit', ['id' => session()->get('user_condominium_id')]) }}" role="menuitem">
                                <i class="icon wb-user" aria-hidden="true"></i>
                                Perfil
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="javascript:void(0)" role="menuitem">
                                <i class="icon wb-calendar" aria-hidden="true"></i>
                                Assinatura
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="{{ route('portal.condominium.user.password') }}" role="menuitem">
                                <i class="icon md-key" aria-hidden="true"></i>
                                Alterar Senha
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="{{ route('portal.condominium.user.config', ['id' => session()->get('user_condominium_id')]) }}" role="menuitem">
                                <i class="icon md-settings"  aria-hidden="true"></i>
                                Configurações
                            </a>
                        </li>
                        <li class="divider" role="presentation"></li>
                        <li role="presentation">
                            <a href="{{ url('/logout') }}" role="menuitem"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="icon md-power" aria-hidden="true"></i>
                                Sair
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                @if(!isset($config['notification']))
                <li class="dropdown showNotification">
                    <a data-toggle="dropdown" href="javascript:void(0)" title="Notifications" aria-expanded="false"
                       data-animation="scale-up" role="button">
                        <i class="icon md-notifications" aria-hidden="true"></i>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>