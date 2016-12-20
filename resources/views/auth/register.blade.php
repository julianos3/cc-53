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
                    <img class="brand-img" src="{{ asset('portal/assets/images/logo@2x.png') }}" width="500"
                         alt="Central Condo">
                </div>
                <p class="font-size-20">
                    A gestão do seu condomínio na palma da sua mão
                </p>
            </div>
            <div class="page-login-main">
                <div class="brand visible-xs">
                    <img class="brand-img" src="{{ asset('portal/assets/images/logo.png') }}" alt="Central Condo">
                    <h3 class="brand-text font-size-40">Central Condo</h3>
                </div>
                <h3 class="font-size-24">Cadastro</h3>
                <p>Preencha as informações abaixo para iniciar seu cadastro.</p>

                @include('errors._check')

                {!! Form::open(['url'=>'/register', 'role' => 'form', 'autocomplete' => 'off']) !!}

                @include('auth._form_register')

                <div class="form-group">
                    {!! Form::button('Salvar', ['type' => 'submit', 'class'=>'btn btn-primary btn-block']) !!}
                </div>

                {!! Form::close() !!}

                <p>Já possui uma conta? Por favor faça seu <a href="{{ url('/login') }}">Login</a></p>

                <footer class="page-copyright">
                    <p>© 2016. {{ trans('validation.attributes.all-right-reserved') }}</p>
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
</body>
@endsection
