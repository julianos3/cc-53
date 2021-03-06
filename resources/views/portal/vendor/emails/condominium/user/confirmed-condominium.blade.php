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
                    <td valign="middle" align="center" style="padding:10px; color: #FFFFff; font-size: 1.2em;" bgcolor="#55ba5e">
                        <p>
                            Olá {{ $name }}, você acaba de ser aprovado<br />
                            ao condomínio <strong>{{ $nameCondominium }}</strong>!
                        </p>
                        <p>
                            Seus acessos permanecem os mesmos, demais <br />
                            informações sobre como navegar pelos condomínios <br />
                            vinculados podem ser encontadas em nosso FAQ.
                        </p>
                    </td>
                </tr>
            </table>

            @include('portal.vendor.emails.inc.desejamos')
            @include('portal.vendor.emails.inc.footer')

        </td>
    </tr>
</table>
</body>
</html>
