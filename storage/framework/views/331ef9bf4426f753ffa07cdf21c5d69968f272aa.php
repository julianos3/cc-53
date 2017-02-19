<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script>
    PagSeguroDirectPayment.setSessionId('<?php echo e(PagSeguro::startSession()); ?>'); //PagSeguroRecorrente tem um método identico, use o que preferir neste caso, não tem diferença.

    PagSeguroDirectPayment.getSenderHash();
</script>