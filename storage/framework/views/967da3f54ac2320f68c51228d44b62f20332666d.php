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
            <img class="navbar-brand-logo" src="<?php echo e(asset('portal/assets/images/logo.png')); ?>" title="Central Condo">
        </div>
        <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-search" data-toggle="collapse">
            <span class="sr-only">Toggle Search</span>
            <i class="icon md-search" aria-hidden="true"></i>
        </button>
    </div>
    <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
            <!-- Navbar Toolbar -->
            <?php if(!isset($config['menu'])): ?>
            <ul class="nav navbar-toolbar">
                <li class="hidden-float" id="toggleMenubar">
                    <a data-toggle="menubar" href="#" role="button">
                        <i class="icon hamburger hamburger-arrow-left">
                            <span class="sr-only">Toggle menubar</span>
                            <span class="hamburger-bar"></span>
                        </i>
                    </a>
                </li>
                <li class="hidden-xs" id="toggleFullscreen">
                    <a class="icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                        <span class="sr-only">Toggle fullscreen</span>
                    </a>
                </li>
                <li class="hidden-float">
                    <a class="icon md-search" data-toggle="collapse" href="#" data-target="#site-navbar-search"
                       role="button">
                        <span class="sr-only">Toggle Search</span>
                    </a>
                </li>
            </ul>
            <?php endif; ?>
            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                <li class="dropdown">
                    <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
                       data-animation="scale-up" role="button">
                      <span class="avatar avatar-online">
                        <img src="<?php echo e(session()->get('image')); ?>" alt="<?php echo e(Auth::user()->name); ?>" title="<?php echo e(Auth::user()->name); ?>">
                        <i></i>
                      </span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation">
                            <a href="<?php echo e(route('portal.condominium.user.edit', ['id' => session()->get('user_condominium_id')])); ?>" role="menuitem">
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
                            <a href="javascript:void(0)" role="menuitem">
                                <i class="icon md-settings"  aria-hidden="true"></i>
                                Configurações
                            </a>
                        </li>
                        <li class="divider" role="presentation"></li>
                        <li role="presentation">
                            <a href="<?php echo e(url('/logout')); ?>" role="menuitem"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="icon md-power" aria-hidden="true"></i>
                                Sair
                            </a>
                            <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                <?php echo e(csrf_field()); ?>

                            </form>
                        </li>
                    </ul>
                </li>
                <?php if(!isset($config['notification'])): ?>
                <li class="dropdown showNotification">
                    <a data-toggle="dropdown" href="javascript:void(0)" title="Notifications" aria-expanded="false"
                       data-animation="scale-up" role="button">
                        <i class="icon md-notifications" aria-hidden="true"></i>
                    </a>
                </li>
                <?php endif; ?>
                <?php if(!isset($config['message'])): ?>
                <li class="dropdown">
                    <a data-toggle="dropdown" href="javascript:void(0)" title="Messages" aria-expanded="false"
                       data-animation="scale-up" role="button">
                        <i class="icon md-email" aria-hidden="true"></i>
                        <span class="badge badge-info up">3</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                        <li class="dropdown-menu-header" role="presentation">
                            <h5>MESSAGES</h5>
                            <span class="label label-round label-info">New 3</span>
                        </li>
                        <li class="list-group" role="presentation">
                            <div data-role="container">
                                <div data-role="content">
                                    <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="media-left padding-right-10">
                          <span class="avatar avatar-sm avatar-online">
                            <img src="<?php echo e(asset('portal/global/portraits/2.jpg')); ?>" alt="..."/>
                            <i></i>
                          </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Mary Adams</h6>
                                                <div class="media-meta">
                                                    <time datetime="2016-06-17T20:22:05+08:00">30 minutes ago</time>
                                                </div>
                                                <div class="media-detail">Anyways, i would like just do it</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="media-left padding-right-10">
                          <span class="avatar avatar-sm avatar-off">
                            <img src="<?php echo e(asset('portal/global/portraits/3.jpg')); ?>" alt="..."/>
                            <i></i>
                          </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Caleb Richards</h6>
                                                <div class="media-meta">
                                                    <time datetime="2016-06-17T12:30:30+08:00">12 hours ago</time>
                                                </div>
                                                <div class="media-detail">I checheck the document. But there seems</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="media-left padding-right-10">
                          <span class="avatar avatar-sm avatar-busy">
                            <img src="<?php echo e(asset('portal/global/portraits/4.jpg')); ?>" alt="..."/>
                            <i></i>
                          </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">June Lane</h6>
                                                <div class="media-meta">
                                                    <time datetime="2016-06-16T18:38:40+08:00">2 days ago</time>
                                                </div>
                                                <div class="media-detail">Lorem ipsum Id consectetur et minim</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="media-left padding-right-10">
                          <span class="avatar avatar-sm avatar-away">
                            <img src="<?php echo e(asset('portal/global/portraits/5.jpg')); ?>  " alt="..."/>
                            <i></i>
                          </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Edward Fletcher</h6>
                                                <div class="media-meta">
                                                    <time datetime="2016-06-15T20:34:48+08:00">3 days ago</time>
                                                </div>
                                                <div class="media-detail">Dolor et irure cupidatat commodo nostrud
                                                    nostrud.
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-menu-footer" role="presentation">
                            <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                                <i class="icon md-settings" aria-hidden="true"></i>
                            </a>
                            <a href="javascript:void(0)" role="menuitem">
                                See all messages
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
            </ul>
            <!-- End Navbar Toolbar Right -->
        </div>
        <!-- End Navbar Collapse -->
        <!-- Site Navbar Seach
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
        </div>-->
        <!-- End Site Navbar Seach -->
    </div>
</nav>