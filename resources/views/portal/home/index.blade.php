@extends('portal.layouts.portal')

@section('content')
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">{{ $condominium->name }}</h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="{{ route('portal.home.index') }}">Dashboard</a></li>
                <li class="active">{{ $condominium->name }}</li>
            </ol>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body">
                    home do sistema
                    <div class="row">
                        <div class="col-md-12">
                            CHAMADAS DA HOME<br>
                            - Agenda<br>
                            - Próximas manutenções preventivas<br>
                            - Contratos próximos a vencer<br>
                            - Ultimos chamados<br>
                            - Ultimas do forum]<br>
                            - Ultimas comunicados<br>
                            - Mural de recados<br>
                            - assembleia
                        </div>
                    </div>
                    <div class="row margin-top-30">
                        <div class="col-md-12">
                            ITENS QUE FALTA<br>
                            <!--
                            - Imagens padrões para condominios sem imagem - OK<br />
                            - Edição do Condomínio - OK<br />
                            - Validar CNPJ no cadastro e no editar - OK<br />
                            - Imagens padrões para integrantes sem imagem - OK<br />
                            - Número de integrantes na listagem dos condomínio<br />
                            - Usuários para aprovação no sistema - OK<br>
                            - Logout redirecionar para /login - OK<br />
                            -->
                            - Assinatura<br>
                            - Agenda<br />
                            - Mensagens Privadas<br />
                            - Forum<br />
                            - Status de perfil completo do usuário<br />
                            - Status do perfil completo do condominio<br />
                            - Configurações<br />
                            - Mensagens no topo<br />
                            - Gerar nova senha e enviar por email para o integrante / Apenas adm pode fazer
                        </div>
                    </div>

                    <div class="row margin-top-30">
                        <div class="col-md-12">
                            ID Condominium: {{ $condominium->id }}<br/>
                            Condominium Name: {{ $condominium->name }}<br/>
                            User Condominium ID: {{ $userCondominiumId }}<br />
                            User Role Condominium {{ $userRoleCondominiumId }}<br />
                            {{ session()->get('condominium_id') }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection