<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <title>{{ $title }} - {{ config('app.name') }}</title>

    <style type="text/css">
        .ReadMsgBody {width: 100%; background-color: #ffffff;}
        .ExternalClass {width: 100%; background-color: #ffffff;}
        body	 {width: 100%; background-color: #000; margin:0; padding:0; -webkit-font-smoothing: antialiased;font-family: Georgia, Times, serif}
        table {border-collapse: collapse;}

        @media only screen and (max-width: 640px)  {
            body[yahoo] .deviceWidth {width:440px!important; padding:0;}
            body[yahoo] .center {text-align: center!important;}
        }

        @media only screen and (max-width: 479px) {
            body[yahoo] .deviceWidth {width:280px!important; padding:0;}
            body[yahoo] .center {text-align: center!important;}
        }

    </style>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" yahoo="fix" style="font-family: Arial;">
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
    <tr>
        <td width="100%" valign="top" bgcolor="#d0d0d0" style="padding-top:20px">

            @include('portal.vendor.emails.inc.header')

            <table width="580"  class="deviceWidth" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#d0d0d0" style="margin:0 auto;">
                <tr>
                    <td valign="middle" align="center" style="padding-bottom:10px" bgcolor="#ffffff">
                        <a href="http://www.centralcondo.com.br" title="Central Condo">
                            <img  class="deviceWidth" src="{{ asset('portal/assets/images/email/bem-vindo.png') }}" alt="Bem Vindo" title="Bem Vindo" border="0" style="display: block;" />
                        </a>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="center" bgcolor="#ffffff">
                        <a href="{{ config('app.url') }}" title="{{ config('app.name') }}">
                            <img  class="deviceWidth" width="100%" src="{{ asset('portal/assets/images/email/monitores.png') }}" alt="{{ config('app.name') }}" title="{{ config('app.name') }}" border="0" style="display: block;" />
                        </a>
                    </td>
                </tr>
            </table>

            <table width="580"  class="deviceWidth" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#d0d0d0" style="margin:0 auto;">
                <tr>
                    <td valign="middle" align="center" style="padding:10px; color: #FFFFff; font-size: 1.2em;" bgcolor="#55ba5e">
                        <p>Olá {{ $name }}, seja <strong>muito bem vindo</strong> ao {{ config('app.name') }}!</p>
                        <p>
                            A partir de hoje, gerenciar ou acessar<br />
                            informações do seu condomínio ficou<br />
                            muito mais fácil e rápido.
                        </p>
                    </td>
                </tr>
            </table>

            <table width="580"  class="deviceWidth" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#d0d0d0" style="margin:0 auto;">
                <tr>
                    <td valign="middle" align="center" style="padding:10px; color: #9a9b9f; font-size: 1.2em;" bgcolor="#ffffff">
                        <p>Seus acessos para começar sua interação com o condomínio {{ $nameCondominium }} seguem abaixo:</p>
                        <p>
                            E-mail: {{ $email }}<br />
                            Senha: {{ $password }}<br />
                            Endereço de acesso: <a href="{{ config('app.url') }}/login" style="color: #9a9b9f;">Portal Central Condo</a>
                        </p>
                    </td>
                </tr>
            </table>

            <table width="580" border="0" cellpadding="0" cellspacing="0" align="center" class="deviceWidth" bgcolor="#ffffff" style="margin:0 auto;">
                <tr bgcolor="#55ba5e" height="2">
                    <td></td>
                </tr>
                <tr bgcolor="#3d9e51" height="1">
                    <td></td>
                </tr>
            </table>

            @include('portal.vendor.emails.inc.desejamos')
            @include('portal.vendor.emails.inc.footer')

        </td>
    </tr>
</table>
</body>
</html>
