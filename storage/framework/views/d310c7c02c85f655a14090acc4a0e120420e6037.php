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
            <a href="<?php echo e(url('portal/home')); ?>" title="<?php echo e(config('app.name')); ?>">
                <img class="navbar-brand-logo" src="<?php echo e(asset('portal/assets/images/logo.png')); ?>" title="<?php echo e(config('app.name')); ?>">
            </a>
        </div>
    </div>
    <div class="navbar-container container-fluid">
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                <li class="dropdown">
                    <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="scale-up" role="button">
                        <span class="avatar avatar-online">
                            <img src="<?php echo e(session()->get('image')); ?>" alt="<?php echo e(Auth::user()->name); ?>" title="<?php echo e(Auth::user()->name); ?>">
                            <i></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <?php if(session()->get('condominium_id') != ''): ?>
                            <li role="presentation">
                                <a href="<?php echo e(route('portal.condominium.user.edit', ['id' => session()->get('user_condominium_id')])); ?>" role="menuitem">
                                    <i class="icon md-account" aria-hidden="true"></i>
                                    Perfil
                                </a>
                            </li>
                            <?php if(session()->get('admin') == 'y'): ?>
                                <li role="presentation">
                                    <a href="<?php echo e(route('portal.condominium.subscriptions.index')); ?>" role="menuitem">
                                        <i class="icon md-card" aria-hidden="true"></i>
                                        Assinatura
                                    </a>
                                </li>
                            <?php endif; ?>
                            <li role="presentation">
                                <a href="<?php echo e(route('portal.condominium.user.password')); ?>" role="menuitem">
                                    <i class="icon md-key" aria-hidden="true"></i>
                                    Alterar Senha
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="<?php echo e(route('portal.condominium.user.config', ['id' => session()->get('user_condominium_id')])); ?>" role="menuitem">
                                    <i class="icon md-settings"  aria-hidden="true"></i>
                                    Configurações
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="divider" role="presentation"></li>
                        <li role="presentation">
                            <a href="<?php echo e(url('/logout')); ?>" role="menuitem" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
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
                    <?php $notification = app('CentralCondo\Http\Controllers\Portal\Communication\Notification\NotificationController'); ?>
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
                    <li class="dropdown">
                        <a data-toggle="dropdown" href="javascript:void(0)" title="Notifications" aria-expanded="false" data-animation="scale-up" role="button">
                            <i class="icon md-notifications" aria-hidden="true"></i>
                            <?php if($totalClick > 0): ?>
                                <span class="badge badge-danger up"><?php echo $totalClick; ?></span>
                            <?php endif; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                            <li class="dropdown-menu-header" role="presentation">
                                <h5>NOTIFICAÇÕES</h5>
                                <span class="label label-round label-danger"><?php echo $totalClick; ?></span>
                            </li>
                            <li class="list-group" role="presentation">
                                <div data-role="container">
                                    <div data-role="content">
                                        <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <a class="list-group-item" href="<?php echo $notification->route; ?>" role="menuitem">
                                                <div class="media">
                                                    <div class="media-left padding-right-10">
                                                        <i class="icon md-receipt bg-red-600 white icon-circle" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading"><?php echo $notification->name; ?></h6>
                                                        <time class="media-meta" datetime="<?php echo date('d/m/Y H:i', strtotime($notification->created_at)); ?>">
                                                            <?php echo date('d/m/Y H:i', strtotime($notification->created_at)); ?>

                                                        </time>
                                                    </div>
                                                </div>
                                            </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                            <div class="media">
                                                <div class="media-left padding-right-10">
                                                    <i class="icon md-account bg-green-600 white icon-circle" aria-hidden="true"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Completed the task</h6>
                                                    <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">2 days ago</time>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                            <div class="media">
                                                <div class="media-left padding-right-10">
                                                    <i class="icon md-settings bg-red-600 white icon-circle" aria-hidden="true"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Settings updated</h6>
                                                    <time class="media-meta" datetime="2015-06-11T14:05:00+08:00">2 days ago</time>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                            <div class="media">
                                                <div class="media-left padding-right-10">
                                                    <i class="icon md-calendar bg-blue-600 white icon-circle" aria-hidden="true"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Event started</h6>
                                                    <time class="media-meta" datetime="2015-06-10T13:50:18+08:00">3 days ago</time>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                            <div class="media">
                                                <div class="media-left padding-right-10">
                                                    <i class="icon md-comment bg-orange-600 white icon-circle" aria-hidden="true"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Message received</h6>
                                                    <time class="media-meta" datetime="2015-06-10T12:34:48+08:00">3 days ago</time>
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
                                    Todas notificações
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
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