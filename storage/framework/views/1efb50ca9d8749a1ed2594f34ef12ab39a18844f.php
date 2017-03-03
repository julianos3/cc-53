    <aside id="sidebar-left" class="sidebar-left">

        <div class="sidebar-header">
            <div class="sidebar-title">
                Menu
            </div>
            <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                <i class="fa fa-bars" aria-label="Menu"></i>
            </div>
        </div>

        <div class="nano">
            <div class="nano-content">
                <nav id="menu" class="nav-main" role="navigation">
                    <ul class="nav nav-main">
                        <li <?php if(isset($config['activeMenu']) && $config['activeMenu'] == 'home'): ?>class="nav-expanded nav-active"<?php endif; ?>>
                            <a href="<?php echo e(route('admin.home.index')); ?>">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li <?php if(isset($config['activeMenu']) && $config['activeMenu'] == 'blog'): ?>class="nav-expanded nav-active"<?php endif; ?>>
                            <a href="<?php echo e(route('admin.blog.index')); ?>">
                                <i class="fa fa-tag" aria-hidden="true"></i>
                                <span>Blog</span>
                            </a>
                        </li>
                        <li <?php if(isset($config['activeMenu']) && $config['activeMenu'] == 'tags'): ?>class="nav-expanded nav-active"<?php endif; ?>>
                            <a href="<?php echo e(route('admin.tags.index')); ?>">
                                <i class="fa fa-tags" aria-hidden="true"></i>
                                <span>Tags</span>
                            </a>
                        </li>
                        <li <?php if(isset($config['activeMenu']) && $config['activeMenu'] == 'users'): ?>class="nav-expanded nav-active"<?php endif; ?>>
                            <a href="<?php echo e(route('admin.users.index')); ?>">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span>Usuários</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </aside>


