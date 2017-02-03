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
            <div class="panel">
                <div class="panel-body">
                    @include('success._check')
                    @include('errors._check')
                    <div class="col-md-6">
                        informações sobre a assinatura!
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-lg-12 form-group">
                                <div class="example-responsive example form-group">
                                    <div class="col-lg-12 col-md-6 clearfix form-group">
                                        <div class="card-wrapper pull-left" id="cardContainer"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="example-wrap">
                                        <form class="card" id="payment" data-plugin="card" data-target="#cardContainer">
                                            {{ csrf_field() }}

                                            <span class="payment-errors alert alert-danger"></span>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label margin-bottom-15" for="inputCardNumber">Nº cartão de crédito</label>
                                                        <input type="text" class="form-control" id="inputCardNumber" data-stripe="number" name="number" placeholder="Nº cartão de crédito">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label margin-bottom-15" for="inputFullName">Nome Completo</label>
                                                        <input type="text" class="form-control" id="inputFullName" name="name" placeholder="Nome Completo">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label margin-bottom-15" for="inputExpiry">Data Expiração</label>
                                                <input type="text" class="form-control" id="inputExpiry" name="expiry" placeholder="MM/YY">
                                            </div>
                                            <!--
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label margin-bottom-15" for="inputExpiry">Data Expiração</label>
                                                        <br />
                                                        <div class="col-md-6 padding-left-0">
                                                            <input type="text" class="form-control" name="month" data-stripe="exp_month" placeholder="Mês">
                                                        </div>
                                                        <div class="col-md-6 padding-right-0">
                                                            <input type="text" class="form-control" name="year" data-stripe="exp_year" placeholder="Ano">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label margin-bottom-15" for="inputCVC">CVC</label>
                                                        <input type="text" class="form-control" data-stripe="cvc" id="inputCVC" name="cvc" placeholder="CVC">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="submit" class="submit " value="Enviar Dados">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />


                    <!--
                    <form action="{{ url('/testeSend') }}" method="POST" id="payment-form">
                        {{ csrf_field() }}
                        <span class="payment-errors alert alert-danger"></span>

                        <div class="form-row">
                            <label>
                                <span>Card Number</span>
                                <input type="text" size="20" data-stripe="number">
                            </label>
                        </div>

                        <div class="form-row">
                            <label>
                                <span>Expiration (MM/YY)</span>
                                <input type="text" size="2" data-stripe="exp_month">
                            </label>
                            <span> / </span>
                            <input type="text" size="2" data-stripe="exp_year">
                        </div>

                        <div class="form-row">
                            <label>
                                <span>CVC</span>
                                <input type="text" size="4" data-stripe="cvc">
                            </label>
                        </div>

                        <input type="submit" class="submit" value="Submit Payment">
                    </form>
                    -->

                </div>
            </div>
        </div>
    </div>

@endsection