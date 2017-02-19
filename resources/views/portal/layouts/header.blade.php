<nav class="site-navbar navbar navbar-inverse navbar-fixed-top navbar-mega" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided" data-toggle="menubar">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse" data-toggle="collapse">
            <i class="icon md-more" aria-hidden="true"></i>
        </button>
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
            <a href="{{ url('portal/home') }}" title="{{ config('app.name') }}">
                <img class="navbar-brand-logo" src="{{ asset('portal/assets/images/logo.png') }}" title="{{ config('app.name') }}">
            </a>
        </div>
    </div>
    <div class="navbar-container container-fluid">
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                <li class="dropdown">
                    <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="scale-up" role="button">
                        <span class="avatar cover avatar-online">
                            <div class="cover-background" style="background-image: url('{{ session()->get('image') }}')"></div>
                        </span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        @if(session()->get('condominium_id') != '')
                            <li role="presentation">
                                <a href="{{ route('portal.condominium.user.edit', ['id' => session()->get('user_condominium_id')]) }}" role="menuitem">
                                    <i class="icon md-account" aria-hidden="true"></i>
                                    Perfil
                                </a>
                            </li>
                            @if(session()->get('admin') == 'y')
                                <li role="presentation">
                                    <a href="{{ route('portal.condominium.subscriptions.index') }}" role="menuitem">
                                        <i class="icon md-card" aria-hidden="true"></i>
                                        Assinatura
                                    </a>
                                </li>
                            @endif
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
                        @endif
                        <li class="divider" role="presentation"></li>
                        <li role="presentation">
                            <a href="{{ url('/logout') }}" role="menuitem" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
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
                    @inject('notification', 'CentralCondo\Http\Controllers\Portal\Communication\Notification\NotificationController')
                    <?php
                    $totalNotification = $notification->listTop()->count();
                    $notifications = $notification->listTop();
                    $totalClick = 0;
                    if ($notifications->toArray()) {
                        foreach ($notifications as $row) {
                            if ($row->click == 'n') {
                                $totalClick++;
                            }
                        }
                    }
                    ?>
                    <li class="dropdown showNotification">
                        @include('portal.communication.notification.show')
                    </li>
                @endif
            </ul>
        </div>
        <!-- End Navbar Collapse -->
        <!-- Site Navbar Seach -->
        <div class="collapse navbar-search-overlap" id="site-navbar-search">
            <form role="search">
                <div class="form-group">
                    <div class="input-search">
                        <i class="input-search-icon md-search" aria-hidden="true"></i>
                        <input type="text" class="form-control" name="site-search" placeholder="Search...">
                        <button type="button" class="input-search-close icon md-close" data-target="#site-navbar-search"
                                data-toggle="collapse" aria-label="Close"></button>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Site Navbar Seach -->
    </div>
</nav>