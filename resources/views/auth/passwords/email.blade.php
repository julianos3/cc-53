@extends('portal.layouts.auth')
@section('content')
    <body class="page-forgot-password layout-full">
    <!--[if lt IE 8]>
    <p class="browserupgrade">
        Você esta usando um navegador <strong>desatualizado.</strong> Por favor,
        <a href="http://browsehappy.com/">atualize seu navegador</a> para melhorar a sua experiência.
    </p>
    <![endif]-->

    <div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
         data-animsition-out="fade-out">
        <div class="page-content vertical-align-middle">
            <h2>Esqueceu a senha?</h2>
            <p>Insira seu e-mail cadastrado para redefinir sua senha</p>
            <form method="post" role="form" action="{{ url('/password/email') }}">
                {!! csrf_field() !!}

                @include('success._check')
                @include('errors._check')

                <div class="form-group">
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Seu email" required="required">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Redefinir sua senha</button>
                </div>
            </form>
            <footer class="page-copyright">
                <p>© 2017. Todos os direitos reservados.</p>
                <div class="social">
                    <a href="javascript:void(0)">
                        <i class="icon bd-twitter" aria-hidden="true"></i>
                    </a>
                    <a href="javascript:void(0)">
                        <i class="icon bd-facebook" aria-hidden="true"></i>
                    </a>
                </div>
            </footer>
        </div>
    </div>
@endsection
