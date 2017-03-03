<header class="header">
    <div class="logo-container">
        <a href="<?php echo e(config('app.url')); ?>" class="logo">
            <?php echo e(config('app.name')); ?>

        </a>
    </div>

    <div class="header-right">
        <span class="separator"></span>
        <ul class="notifications">

        </ul>
        <span class="separator"></span>

        <div id="userbox" class="userbox">
            <a href="javascript:void(0);" data-toggle="dropdown">
                <figure class="profile-picture">
                    <?php if(Auth::guard('admin_user')->user()->image): ?>
                    <img src="<?php echo e(asset('uploads/users/'.Auth::guard('admin_user')->user()->image)); ?>" alt="Joseph Doe" class="img-circle" data-lock-picture="<?php echo e(asset('uploads/users/'.Auth::guard('admin_user')->user()->image)); ?>" />
                    <?php endif; ?>
                </figure>
                <div class="profile-info" data-lock-name="<?php echo e(Auth::guard('admin_user')->user()->name); ?>" data-lock-email="<?php echo e(Auth::guard('admin_user')->user()->email); ?>">
                    <span class="name"><?php echo e(Auth::guard('admin_user')->user()->name); ?></span>
                </div>
                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="<?php echo e(route('admin.users.edit', ['id'=> Auth::guard('admin_user')->user()->id])); ?>">
                            <i class="fa fa-user"></i> Meu Perfil
                        </a>
                    </li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="<?php echo e(url('/admin/logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i> Sair
                            <form id="logout-form" action="<?php echo e(url('/admin/logout')); ?>" method="POST" style="display: none;">
                                <?php echo e(csrf_field()); ?>

                            </form>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>