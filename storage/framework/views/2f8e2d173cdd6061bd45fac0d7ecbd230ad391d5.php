<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <title><?php echo e($title); ?> - <?php echo e(config('app.name')); ?></title>

    <style type="text/css">
        .ReadMsgBody {width: 100%; background-color: #ffffff;}
        .ExternalClass {width: 100%; background-color: #ffffff;}
        body	 {width: 100%; background-color: #000; margin:0; padding:0; -webkit-font-smoothing: antialiased;font-family: Georgia, Times, serif}
        table {border-collapse: collapse;}

        @media  only screen and (max-width: 640px)  {
            body[yahoo] .deviceWidth {width:440px!important; padding:0;}
            body[yahoo] .center {text-align: center!important;}
        }

        @media  only screen and (max-width: 479px) {
            body[yahoo] .deviceWidth {width:280px!important; padding:0;}
            body[yahoo] .center {text-align: center!important;}
        }

    </style>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" yahoo="fix" style="font-family: Arial;">
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
    <tr>
        <td width="100%" valign="top" bgcolor="#d0d0d0" style="padding-top:20px">

            <?php echo $__env->make('portal.vendor.emails.inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <table width="580"  class="deviceWidth" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#d0d0d0" style="margin:0 auto;">
                <tr>
                    <td valign="middle" align="center" style="padding:10px; color: #FFFFff; font-size: 1.2em;" bgcolor="#55ba5e">
                        <p>
                            Olá <?php echo e($name); ?>, informamos que o comunicado #<?php echo e($id); ?> do condomínio <strong><?php echo e($nameCondominium); ?></strong><br />sofreu alteração!
                        </p>
                        <p>
                            Para visualizar maiores detalhes sobre a alteração do comunicado<br />
                            acesse <a style="color: #ffffff; font-weight: bold; text-decoration: underline;" href="<?php echo e($route); ?>" title="<?php echo e(config('app.name')); ?>">aqui</a>.<br /><br />
                        </p>
                    </td>
                </tr>
            </table>

            <?php echo $__env->make('portal.vendor.emails.inc.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </td>
    </tr>
</table>
</body>
</html>
