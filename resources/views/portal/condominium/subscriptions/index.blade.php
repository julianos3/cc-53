@extends('portal.layouts.portal')

@section('content')

    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">{{ $config['title'] }}</h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="{{ route('portal.home.index') }}">Home</a></li>
                <li><a href="{{ route('portal.condominium.index') }}">Condomínio</a></li>
                <li class="active">Assinatura</li>
            </ol>
        </div>
        <div class="page-content">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="alert alert-warning">
                                <p>
                                    <span class="font-size-18 font-weight-bold">Assinatua Central Condo mensal - R$ {{ $valuePlan }}</span><br />
                                    O valor da assinatura é calculado conforme o número de unidades que seu condomínio possui.
                                </p>
                                <!--
                                <p>
                                    Verifique a tabela de valores <a class="text-warning font-weight-bold" href="" title="acessando aqui">acessando aqui.</a>
                                </p>
                                -->
                            </div>
                            <p class="alert alert-warning">
                                Preço unico para todo o condomínio <strong>{{ session()->get('name') }}</strong><br />
                                Com uma única assinatura, o condomínio e seus integrantes utilizam todos os recursos sem outros custos e sem limitações.
                            </p>
                            <div class="alert alert-info">
                                <p>
                                    Para pagamentos através de boletos somente nos planos semestral e anual.
                                <p>
                                <p>
                                    Entre em contato pelo e-mail <a class="text-info font-weight-bold" href="mailto:suporte@centralcondo.com.br"><strong>suporte@centralcondo.com.br</strong></a> para obter melhores informações.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-body">
                            @include('success._check')
                            @include('errors._check')
                            @include('portal.modals.warning')

                            <h1>Em Construção!</h1>
                        <!--

                    @if(session()->get('subscription_id'))
                            @if ($condominium->subscribed(session()->get('subscription_name')))
                                <div class="row">
                                    <div class="col-md-12">
                                        @if ($condominium->subscription(session()->get('subscription_name'))->onGracePeriod())

                                    <a href="javascript:void(0);"
                                       data-target="#modalWarning" data-toggle="modal"
                                       data-route="{{ route('portal.condominium.subscriptions.resume') }}"
                                           data-msg="Deseja reativar a assinatura do condomínio {{ session()->get('name') }}?"
                                           title="Enviar nova senha por e-mail" class="col-md-12 btn btn-lg btn-success btnShowWarning">
                                            <i class="icon wb-check"></i>
                                            Reativar Assinatura
                                        </a>
                                    @else
                                    <a href="javascript:void(0);"
                                       data-target="#modalWarning" data-toggle="modal"
                                       data-route="{{ route('portal.condominium.subscriptions.cancel') }}"
                                       data-msg="Deseja realmente cancelar a assinatura do condomínio {{ session()->get('name') }}?"
                                       title="Enviar nova senha por e-mail" class="col-md-12 btn btn-lg btn-danger btnShowWarning">
                                        <i class="icon wb-alert-circle"></i>
                                        Cancelar Assinatura
                                    </a>
                                    @endif
                                        </div>
                                    </div>
                                @endif
                        @endif
                        @if (!$condominium->subscribed(session()->get('subscription_name')))
                            <p>
                                Informe os dados do seu cartão de crédito e clique em "Finalizar Pagamento"
                            </p>

                            <form action="{{ route('portal.condominium.subscriptions.store') }}" method="POST" id="payment-form">
                        {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="payment-errors" style="color: #f44336;"></span>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>
                                                    <span>Número do cartão: </span>
                                                </label>
                                                <input type="text" class="form-control" size="20" maxlength="20" data-stripe="number" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="col-md-12 padding-left-0">Data de validade (MM/YY)</label>
                                            <div class="col-md-6 padding-left-0 padding-bottom-0 form-group">
                                                <input type="text" class="form-control" placeholder="MM" maxlength="2" size="2" data-stripe="exp_month" required>
                                            </div>
                                            <div class="col-md-6 padding-left-0 padding-bottom-0 padding-right-0 form-group">
                                                <input type="text" class="form-control" placeholder="AA" maxlength="2" size="2" data-stripe="exp_year" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>CVC: </label>
                                                <input type="text" class="form-control" size="4" maxlength="4" data-stripe="cvc" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="submit btn btn-default btn-primary">Finalizar Pagamento</button>
                                        </div>
                                    </div>
                                </form>
                                @endif

                                -->

                        </div>
                    </div>
                </div>
            </div>

@endsection