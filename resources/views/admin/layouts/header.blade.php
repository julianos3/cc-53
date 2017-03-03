<header class="header">
    <div class="logo-container">
        <a href="{{ config('app.url') }}" class="logo">
            {{ config('app.name') }}
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
                    @if(Auth::guard('admin_user')->user()->image)
                    <img src="{{ asset('uploads/users/'.Auth::guard('admin_user')->user()->image) }}" alt="Joseph Doe" class="img-circle" data-lock-picture="{{ asset('uploads/users/'.Auth::guard('admin_user')->user()->image) }}" />
                    @endif
                </figure>
                <div class="profile-info" data-lock-name="{{ Auth::guard('admin_user')->user()->name }}" data-lock-email="{{ Auth::guard('admin_user')->user()->email }}">
                    <span class="name">{{ Auth::guard('admin_user')->user()->name }}</span>
                </div>
                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="{{ route('admin.users.edit', ['id'=> Auth::guard('admin_user')->user()->id]) }}">
                            <i class="fa fa-user"></i> Meu Perfil
                        </a>
                    </li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="{{ url('/admin/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i> Sair
                            <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>