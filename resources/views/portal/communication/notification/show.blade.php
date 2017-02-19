<a data-toggle="dropdown" href="javascript:void(0)" title="Notifications" aria-expanded="false" data-animation="scale-up" role="button">
    <i class="icon md-notifications" aria-hidden="true"></i>
    @if($totalClick > 0)
        <span class="badge badge-danger up">{!! $totalClick !!}</span>
    @endif
</a>
<ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
    <li class="dropdown-menu-header" role="presentation">
        <h5>NOTIFICAÇÕES</h5>
        <span class="label label-round label-danger">{!! $totalClick !!}</span>
    </li>
    <li class="list-group" role="presentation">
        <div data-role="container">
            <div data-role="content">
                @foreach($notifications as $notification)
                    <a class="list-group-item" href="{!! $notification->route !!}" role="menuitem">
                        <div class="media">
                            <div class="media-left padding-right-10">
                                <i class="icon md-receipt bg-red-600 white icon-circle" aria-hidden="true"></i>
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading">{!! $notification->name !!}</h6>
                                <time class="media-meta" datetime="{!! date('d/m/Y H:i', strtotime($notification->created_at)) !!}">
                                    {!! date('d/m/Y H:i', strtotime($notification->created_at)) !!}
                                </time>
                            </div>
                        </div>
                    </a>
                @endforeach
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