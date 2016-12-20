@extends('portal.layouts.auth')
@section('content')
    <body class="page-login-v2 layout-full page-dark">
    <!--[if lt IE 8]>
    <p class="browserupgrade">
        Você esta usando um navegador <strong>desatualizado.</strong> Por favor,
        <a href="http://browsehappy.com/">atualize seu navegador</a> para melhorar a sua experiência.
    </p>
    <![endif]-->
    <div class="page animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
        <div class="page-content">
            <div class="page-brand-info">
                <div class="brand">
                    <img class="brand-img" src="{{ asset('portal/assets/images/logo.png') }}" title="Central Condo" width="70%" alt="Central Condo">
                </div>
                <div style="position:absolute; bottom:0;" class="assineGratis">
                    <a href="{{ url('/register') }}" class="btn btn-lg btn-success" title="Experimente grátis por 15 dias">
                        <strong>Experimente grátis</strong> por 15 dias
                    </a>
                    <p class="font-size-16 color-white margin-top-20">
                        "A <strong>gestão do seu condomínio</strong> na palma da sua mão"
                    </p>
                </div>
            </div>
            <div class="page-login-main">
                <div class="brand visible-sm-block visible-xs">
                    <img class="brand-img" src="{{ asset('portal/assets/images/logo@2x.png') }}" width="100%" title="Central Condo" alt="Central Condo">
                </div>
                <h3 class="font-size-24">Login</h3>
                <form method="post" action="{{ route('login') }}">
                    {!! csrf_field() !!}
                    @include('errors._check')
                    <div class="form-group">
                        <label class="sr-only" for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail" value="{{ old('email') }}" name="email" placeholder="E-mail" required>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="inputPassword">{{ trans('validation.attributes.password') }}</label>
                        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group clearfix">
                        <div class="checkbox-custom checkbox-inline checkbox-primary pull-left">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="inputCheckbox">Lembrar senha</label>
                        </div>
                        <a class="pull-right" href="{{ url('/password/reset') }}">Esqueceu a senha?</a>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
                <p>Não tem conta? <a href="{{ url('/register') }}">Experimente grátis por 15 dias</a></p>
                <footer class="page-copyright">
                    <p>© 2017. Todos os direitos reservados.</p>
                    <div class="social">
                        <a class="btn btn-icon btn-round social-twitter" href="javascript:void(0)">
                            <i class="icon bd-twitter" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-icon btn-round social-facebook" href="javascript:void(0)">
                            <i class="icon bd-facebook" aria-hidden="true"></i>
                        </a>
                    </div>
                </footer>
            </div>
        </div>
    </div>
@endsection