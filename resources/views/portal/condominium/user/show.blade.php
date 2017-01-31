@extends('portal.layouts.portal')
@section('content')
    <div class="page animsition page-profile">
        <div class="page-header">
            <h1 class="page-title">{{ $config['title'] }}</h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="{{ route('portal.home.index') }}">Home</a></li>
                <li><a href="{{ route('portal.condominium.index') }}">Condomínio</a></li>
                <li><a href="{{ route('portal.condominium.user.index') }}">Integrantes</a></li>
                <li class="active">Perfil</li>
            </ol>
            <div class="page-header-actions">
                <a href="{{ route('portal.condominium.user.index') }}"
                   class="btn btn-sm btn-icon btn-dark waves-effect waves-light waves-round" data-toggle="tooltip"
                   data-original-title="Voltar">
                    <i class="icon wb-arrow-left" aria-hidden="true"></i>
                    Voltar
                </a>
            </div>
        </div>
        <div class="page-content container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="widget widget-shadow text-center">
                        <div class="widget-header">
                            <div class="widget-header-content">

                                <?php
                                if($dados->user->imagem){
                                    $imgAvatar = route('portal.condominium.user.image', ['id' => $dados->user->id, 'image' => $dados->user->imagem]);
                                }else{
                                    $imgAvatar = asset('portal/assets/images/user-not-image.jpg');
                                }
                                ?>
                                @if($imgAvatar)
                                    <a class="avatar avatar-lg" href="javascript:void(0);">
                                        <img src="{{ $imgAvatar }}" alt="{{ $dados->user->name }}">
                                    </a>
                                @endif
                                <h4 class="profile-user">{{$dados->user->name}}</h4>
                                <p class="profile-job">{{$dados->userRoleCondominium->name}}</p>
                                <p>
                                    E-mail: {{$dados->user->email}}<br/>
                                    Telefone: {{$dados->user->phone}}<br/>
                                    Celular: {!! $dados->user->cell_phone !!}<br/>
                                </p>

                                @if($dados->user->twitter != '' || $dados->user->facebook != '' ||
                                    $dados->user->instagram != '' || $dados->user->google_plus != '' || $dados->user->linkedin != '')
                                    <div class="profile-social">
                                        @if($dados->user->twitter != '')
                                            <a class="icon bd-twitter" href="{!! $dados->user->twitter !!}" target="_blank"
                                               title="Twitter"></a>
                                        @endif
                                        @if($dados->user->facebook != '')
                                            <a class="icon bd-facebook" href="{{ $dados->user->facebook }}" target="_blank"
                                               title="Facebook"></a>
                                        @endif
                                        @if($dados->user->instagram != '')
                                            <a class="icon bd-instagram" href="{{ $dados->user->instagram }}" target="_blank"
                                               title="Instagram"></a>
                                        @endif
                                        @if($dados->user->google_plus != '')
                                            <a class="icon bd-google-plus" href="{{ $dados->user->google_plus }}" target="_blank"
                                               title="Google Plus"></a>
                                        @endif
                                        @if($dados->user->linkedin != '')
                                            <a class="icon bd-linkedin" href="{{ $dados->user->linkedin }}" target="_blank"
                                               title="Linkedin"></a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel">
                        <div class="panel-body container-fluid">
                            <div class="article-content">

                                @if(!isset($dados->user->description) ||
                                    !isset($dados->user->formation) ||
                                    !isset($dados->user->institution) ||
                                    !isset($dados->user->profession) ||
                                    !isset($dados->user->conclusion) ||
                                    !isset($dados->user->company) ||
                                    is_array($dados->userUnit) ||
                                    !isset($dados->user->site))

                                    <div class="col-md-12 text-center">
                                        <h4 class="page-title">
                                            Nenhuma informação cadastrada.
                                        </h4>
                                    </div>
                                @else
                                    @if($dados->user->description)
                                    <section>
                                        <h4 id="section-1">Sobre mim:</h4>
                                        <p>{{ $dados->user->description }}</p>
                                    </section>
                                    @endif

                                    @if($dados->user->formation != '' && $dados->user->institution && $dados->user->conclusion)
                                    <section>
                                        <h5 id="section-2">Escolaridade</h5>
                                        <p>
                                            Formação: {{ $dados->user->formation }}<br />
                                            Instituição: {{ $dados->user->institution }}<br />
                                            Conclusão: {{ $dados->user->conclusion }}
                                        </p>
                                    </section>
                                    @endif

                                    @if($dados->user->profession && $dados->user->company)
                                    <section>
                                        <h5 id="section-2">Profissional</h5>
                                        <p>
                                            Profissão: {{ $dados->user->profession }}<br />
                                            Empresa: {{ $dados->user->company }}
                                        </p>
                                    </section>
                                    @endif

                                    @if($dados->userUnit->toArray())
                                        <section>
                                            <h5 id="section-2">Unidades</h5>
                                            <p>
                                                <?php
                                                $cont = 0;
                                                foreach ($dados->userUnit as $unit) {
                                                    $cont++;
                                                    if ($cont > 1) {
                                                        echo '<br />';
                                                    }
                                                    echo $unit->unit->name . ' - ' . $unit->unit->block->name;
                                                }
                                                ?>
                                            </p>
                                        </section>
                                    @endif

                                    @if($dados->user->site)
                                    <p>
                                        <strong>Website ou blog:</strong><br />
                                        <a href="{{ $dados->user->site }}" target="_blank" title="{{ $dados->user->site }}">{{ $dados->user->site }}</a>
                                    </p>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection