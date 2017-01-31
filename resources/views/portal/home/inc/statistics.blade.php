@if(session()->get('admin') == 'y')
<div class="col-md-12">
    @if($contract > 0)
    <div class="col-md-4">
        <div class="widget">
            <div class="widget-content padding-35 bg-white clearfix">
                <div class="pull-left white">
                    <i class="icon icon-circle icon-2x wb-clipboard bg-red-600" aria-hidden="true"></i>
                </div>
                <div class="counter counter-md counter text-right pull-right">
                    <div class="counter-number-group">
                        <span class="counter-number">{{ $contract }}</span>
                        <span class="counter-number-related font-size-20">Contrato (s)</span>
                    </div>
                    <div class="counter-label font-size-16">pŕoximos a vencer</div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="col-md-4">
        <div class="widget">
            <div class="widget-content padding-35 bg-white clearfix">
                <div class="pull-left white">
                    <i class="icon icon-circle icon-2x wb-user-add bg-green-600" aria-hidden="true"></i>
                </div>
                <div class="counter counter-md counter text-right pull-right">
                    <div class="counter-number-group">
                        <span class="counter-number">0</span>
                        <span class="counter-number-related font-size-20">Usuário (s)</span>
                    </div>
                    <div class="counter-label font-size-16">para aprovação</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif